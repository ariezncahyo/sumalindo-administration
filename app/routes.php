<?php

 /** ------------------------------------------
	 *  Frontend Routes
	 *  ------------------------------------------
	 */

 	# Halaman Index
	Route::get('/', ['as'=>'home', 'uses'=>'FrontendController@getIndex']);

	#Halaman Daftar Email per Divisi
	Route::get('email', ['as'=>'email', 'uses'=>'FrontendController@getEmail']);

	#Halaman Berita
	Route::get('berita', ['as'=>'berita', 'uses'=>'FrontendController@getDaftar']);
	Route::get('berita/{alias}', ['as'=>'tampil-berita', 'uses'=>'FrontendController@getBerita']);

	# Halaman Divisi Audit
	Route::get('audit', ['as'=>'audit', 'uses'=>'FrontendController@getAudit']);
	Route::get('audit/sop', ['as'=>'auditsop', 'uses'=>'FrontendController@getAuditSop']);
	Route::get('audit/laporan', ['as'=>'auditlaporan', 'uses'=>'FrontendController@getAuditLaporan']);

	# Halaman Divisi Corsek
	Route::get('corsek', ['as'=>'corsek', 'uses'=>'FrontendController@getCorsek']);
	Route::get('corsek/sop', ['as'=>'corseksop', 'uses'=>'FrontendController@getCorsekSop']);
	Route::get('corsek/laporan', ['as'=>'corseklaporan', 'uses'=>'FrontendController@getCorsekLaporan']);

	# Halaman Divisi Finance
	Route::get('finance', ['as'=>'finance', 'uses'=>'FrontendController@getFinance']);
	Route::get('finance/sop', ['as'=>'financesop', 'uses'=>'FrontendController@getFinanceSop']);
	Route::get('finance/laporan', ['as'=>'financelaporan', 'uses'=>'FrontendController@getFinanceLaporan']);

	# Halaman Divisi HRDS
	Route::get('hrds', ['as'=>'hrds', 'uses'=>'FrontendController@getHrds']);
	Route::get('hrds/sop', ['as'=>'hrdssop', 'uses'=>'FrontendController@getHrdsSop']);
	Route::get('hrds/laporan', ['as'=>'hrdslaporan', 'uses'=>'FrontendController@getHrdsLaporan']);

	# Halaman Divisi IT
	Route::get('it', ['as'=>'it', 'uses'=>'FrontendController@getIt']);
	Route::get('it/sop', ['as'=>'itsop', 'uses'=>'FrontendController@getItSop']);
	Route::get('it/laporan', ['as'=>'itlaporan', 'uses'=>'FrontendController@getItLaporan']);
	Route::get('it/team', ['as'=>'itteam', 'uses'=>'FrontendController@getItTeam']);
	Route::get('it/software', ['as'=>'itsoftware', 'uses'=>'FrontendController@getItSoftware']);
	Route::get('it/ifs', ['as'=>'itifs', 'uses'=>'FrontendController@getItIfs']);
	Route::get('it/nonifs', ['as'=>'itnonifs', 'uses'=>'FrontendController@getItNonIfs']);
	Route::get('it/infrastruktur', ['as'=>'itinfrastruktur', 'uses'=>'FrontendController@getItInfrastruktur']);

	# Halaman Divisi KP
	Route::get('kp', ['as'=>'kp', 'uses'=>'FrontendController@getKp']);
	Route::get('kp/sop', ['as'=>'kpsop', 'uses'=>'FrontendController@getKpSop']);
	Route::get('kp/laporan', ['as'=>'kplaporan', 'uses'=>'FrontendController@getKpLaporan']);

	# Halaman Divisi Logging
	Route::get('logging', ['as'=>'logging', 'uses'=>'FrontendController@getLogging']);
	Route::get('logging/sop', ['as'=>'loggingsop', 'uses'=>'FrontendController@getLoggingSop']);
	Route::get('logging/laporan', ['as'=>'logginglaporan', 'uses'=>'FrontendController@getLoggingLaporan']);

	# Halaman Divisi Marketing
	Route::get('marketing', ['as'=>'marketing', 'uses'=>'FrontendController@getMarketing']);
	Route::get('marketing/sop', ['as'=>'marketingsop', 'uses'=>'FrontendController@getMarketingSop']);
	Route::get('marketing/laporan', ['as'=>'marketinglaporan', 'uses'=>'FrontendController@getMarketingLaporan']);

	# Halaman Divisi Plymill
	Route::get('plymill', ['as'=>'plymill', 'uses'=>'FrontendController@getPlymill']);
	Route::get('plymill/sop', ['as'=>'plymillsop', 'uses'=>'FrontendController@getPlymillSop']);
	Route::get('plymill/laporan', ['as'=>'plymilllaporan', 'uses'=>'FrontendController@getPlymillLaporan']);

	# Halaman Divisi Procurement
	Route::get('procurement', ['as'=>'procurement', 'uses'=>'FrontendController@getProcurement']);
	Route::get('procurement/sop', ['as'=>'procurementsop', 'uses'=>'FrontendController@getProcurementSop']);
	Route::get('procurement/laporan', ['as'=>'procurementlaporan', 'uses'=>'FrontendController@getProcurementLaporan']);


 /** ------------------------------------------
	 *  Backend Routes
	 *  ------------------------------------------
	 */

 	Route::get('login', ['as'=>'login', 'uses'=>'AuthController@getLogin']);
	Route::post('login', 'AuthController@postLogin');
	Route::get('logout', ['as'=>'logout', 'uses'=>'AuthController@getLogout']);

	Route::get('admin', ['as'=>'admin', 'before'=>'auth', 'uses'=>'AuthController@getAdmin']);

	# Backend Collection
	Route::group(['prefix' => 'admin', 'before' => 'auth'], function()
	{
		# Daftar SOP
		Route::get('sop', ['as'=>'sop', 'uses'=>'SopController@getSop']);
		Route::get('sop/buat', ['as'=>'sopbaru', 'uses'=>'SopController@postSop']);
		Route::group(['before'=>'csrf'], function()
		{
			Route::post('sop/buat', 'SopController@postSop');
		});
		Route::get('sop/{idSop}/hapus', ['as'=>'hapussop', 'uses'=>'SopController@destroySop'])->where('idSop', '[0-9]+');

		# Daftar Laporan
		Route::get('laporan', ['as'=>'laporan', 'uses'=>'LaporanController@getLaporan']);
		Route::get('laporan/buat', ['as'=>'laporanbaru', 'uses'=>'LaporanController@postLaporan']);
		Route::group(['before'=>'csrf'], function()
		{
			Route::post('laporan/buat', 'LaporanController@postLaporan');
		});
		Route::get('laporan/{idLaporan}/hapus', ['as'=>'hapuslaporan', 'uses'=>'LaporanController@destroyLaporan'])->where('idLaporan', '[0-9]+');

		# Halaman Struktur divisi
		Route::get('struktur', ['as'=>'struktur', 'uses'=>'BackendController@getStruktur']);
		Route::get('struktur/{idStruktur}/edit', ['as'=>'ubahstruktur', 'uses'=>'BackendController@getStruktur'])->where('idStruktur', '[0-9]+');
		Route::group(['before'=>'csrf'], function()
		{
			Route::put('struktur/{idStruktur}/edit', 'BackendController@putStruktur')->where('idStruktur', '[0-9]+');
		});

		# Halaman Profil per divisi
		Route::get('profil', ['as'=>'profil', 'uses'=>'BackendController@getProfil']);
		Route::get('profil/{idProfil}/edit', ['as'=>'ubahprofil', 'uses'=>'BackendController@getProfil'])->where('idProfil', '[0-9]+');
		Route::group(['before'=>'csrf'], function()
		{
			Route::put('profil/{idProfil}/edit', 'BackendController@putProfil')->where('idProfil', '[0-9]+');
		});

		################# Khusus Divisi IT ####################
		# Daftar Software
		Route::get('software', ['as'=>'software', 'uses'=>'ItController@getSoftware']);
		Route::get('software/buat', ['as'=>'softwarebaru', 'uses'=>'ItController@postSoftware']);
		Route::group(['before'=>'csrf'], function()
		{
			Route::post('software/buat', 'ItController@postSoftware');
		});
		Route::get('software/{idSoftware}/hapus', ['as'=>'hapussoftware', 'uses'=>'ItController@destroySoftware'])->where('idSoftware', '[0-9]+');

		# Daftar IFS
		Route::get('ifs', ['as'=>'ifs', 'uses'=>'ItController@getIfs']);
		Route::get('ifs/buat', ['as'=>'ifsbaru', 'uses'=>'ItController@postIfs']);
		Route::group(['before'=>'csrf'], function()
		{
			Route::post('ifs/buat', 'ItController@postIfs');
		});
		Route::get('ifs/{idIfs}/hapus', ['as'=>'hapusifs', 'uses'=>'ItController@destroyIfs'])->where('idIfs', '[0-9]+');

		# Daftar Non-IFS
		Route::get('nonifs', ['as'=>'nonifs', 'uses'=>'ItController@getNonIfs']);
		Route::get('nonifs/buat', ['as'=>'nonifsbaru', 'uses'=>'ItController@postNonIfs']);
		Route::group(['before'=>'csrf'], function()
		{
			Route::post('nonifs/buat', 'ItController@postNonIfs');
		});
		Route::get('nonifs/{idNonIfs}/hapus', ['as'=>'hapusnonifs', 'uses'=>'ItController@destroyNonIfs'])->where('idNonIfs', '[0-9]+');

		# Daftar Infrastruktur
		Route::get('infrastruktur', ['as'=>'infrastruktur', 'uses'=>'ItController@getInfrastruktur']);
		Route::get('infrastruktur/buat', ['as'=>'infrastrukturbaru', 'uses'=>'ItController@postInfrastruktur']);
		Route::group(['before'=>'csrf'], function()
		{
			Route::post('infrastruktur/buat', 'ItController@postInfrastruktur');
		});
		Route::get('infrastruktur/{idInfrastruktur}/hapus', ['as'=>'hapusinfrastruktur', 'uses'=>'ItController@destroyInfrastruktur'])->where('idInfrastruktur', '[0-9]+');

		# Daftar Team IT
		Route::get('team', ['as'=>'team', 'uses'=>'ItController@getTeam']);
		Route::get('team/buat', ['as'=>'teambaru', 'uses'=>'ItController@postTeam']);
		Route::group(['before'=>'csrf'], function()
		{
			Route::post('team/buat', 'ItController@postTeam');
			Route::put('team/{idTeam}/edit', 'ItController@putTeam')->where('idTeam', '[0-9]+');
		});
		Route::get('team/{idTeam}/hapus', ['as'=>'hapusteam', 'uses'=>'ItController@destroyTeam'])->where('idTeam', '[0-9]+');

		# Daftar Email
		Route::get('email', ['as'=>'backendemail', 'uses'=>'ItController@getEmail']);
		Route::get('email/buat', ['as'=>'emailbaru', 'uses'=>'ItController@postEmail']);
		Route::group(['before'=>'csrf'], function()
		{
			Route::post('email/buat', 'ItController@postEmail');
			Route::put('email/{idEmail}/edit', 'ItController@putEmail')->where('idEmail', '[0-9]+');
		});
		Route::get('email/{idEmail}/hapus', ['as'=>'hapusemail', 'uses'=>'ItController@destroyEmail'])->where('idEmail', '[0-9]+');

		# Berita
		Route::get('berita/buat', ['as'=>'beritabaru', 'uses'=>'BackendController@postBerita']);
		Route::group(['before'=>'csrf'], function()
		{
			Route::post('berita/buat', 'BackendController@postBerita');
		});
		Route::get('berita/{idBerita}/hapus', ['as'=>'hapusberita', 'uses'=>'BackendController@destroyBerita'])->where('idIfs', '[0-9]+');

		################# Akhir Divisi IT ####################


	});