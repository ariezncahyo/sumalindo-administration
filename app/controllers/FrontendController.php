<?php

class FrontendController extends AdminController {

	/**
	 * Menampilkan halaman homepage
	 *
	 * @return View
	 */
	public function getIndex()
	{
		$berita = Berita::orderBy('created_at', 'DESC')->get()->slice(0, 12);

		// Tampilkan halaman
		return View::make('frontend.index', compact('berita'));

	}

	/**
	 * Menampilkan halaman homepage
	 *
	 * @return View
	 */
	public function getDaftar()
	{
		$berita = Berita::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.berita', compact('berita'));

	}

	/**
	 * Menampilkan halaman daftar email
	 *
	 * @return View
	 */
	public function getEmail()
	{

		// Tentukan judul halaman
		$judul = 'Daftar Email Karyawan';

		// Tampung isi database
		$daftar = ItEmail::all();

		// Tampilkan halaman
		return View::make('frontend.email', compact('judul', 'daftar'));

	}

	/**
	 * Menampilkan halaman divisi audit
	 *
	 * @return View
	 */
	public function getAudit()
	{
		// Tentukan judul halaman
		$judul = 'SLJ Audit Department';

		// Tampung isi database
		$struktur = AuditStruktur::all();
		$laporan = AuditLaporan::orderBy('created_at', 'DESC')->get()->slice(0, 3);
		$sop = AuditSop::orderBy('created_at', 'DESC')->get()->slice(0, 3);

		// Tampilkan halaman
		return View::make('frontend.divisi.audit', compact('judul', 'struktur', 'laporan', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi audit untuk daftar sop
	 *
	 * @return View
	 */
	public function getAuditSop()
	{
		// Tentukan judul halaman
		$judul = 'Daftar S.O.P Audit Department';

		// Tampung isi database
		$sop = AuditSop::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.audit-sop', compact('judul', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi audit untuk daftar laporan
	 *
	 * @return View
	 */
	public function getAuditLaporan()
	{
		// Tentukan judul halaman
		$judul = 'Daftar Laporan Audit Department';

		// Tampung isi database
		$laporan = AuditLaporan::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.audit-laporan', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman divisi corsek
	 *
	 * @return View
	 */
	public function getCorsek()
	{
		// Tentukan judul halaman
		$judul = 'SLJ Corsek Department';

		// Tampung isi database
		$struktur = CorsekStruktur::all();
		$laporan = CorsekLaporan::orderBy('created_at', 'DESC')->get()->slice(0, 3);
		$sop = CorsekSop::orderBy('created_at', 'DESC')->get()->slice(0, 3);

		// Tampilkan halaman
		return View::make('frontend.divisi.corsek', compact('judul', 'struktur', 'laporan', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi corsek untuk daftar sop
	 *
	 * @return View
	 */
	public function getCorsekSop()
	{
		// Tentukan judul halaman
		$judul = 'Daftar S.O.P Corsek Department';

		// Tampung isi database
		$sop = CorsekSop::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.corsek-sop', compact('judul', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi corsek untuk daftar laporan
	 *
	 * @return View
	 */
	public function getCorsekLaporan()
	{
		// Tentukan judul halaman
		$judul = 'Daftar Laporan Corsek Department';

		// Tampung isi database
		$laporan = CorsekLaporan::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.corsek-laporan', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman divisi finance
	 *
	 * @return View
	 */
	public function getFinance()
	{
		// Tentukan judul halaman
		$judul = 'SLJ Finance Department';

		// Tampung isi database
		$struktur = FinanceStruktur::all();
		$laporan = FinanceLaporan::orderBy('created_at', 'DESC')->get()->slice(0, 3);
		$sop = FinanceSop::orderBy('created_at', 'DESC')->get()->slice(0, 3);

		// Tampilkan halaman
		return View::make('frontend.divisi.finance', compact('judul', 'struktur', 'laporan', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi finance untuk daftar sop
	 *
	 * @return View
	 */
	public function getFinanceSop()
	{
		// Tentukan judul halaman
		$judul = 'Daftar S.O.P Finance Department';

		// Tampung isi database
		$sop = FinanceSop::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.finance-sop', compact('judul', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi finance untuk daftar laporan
	 *
	 * @return View
	 */
	public function getFinanceLaporan()
	{
		// Tentukan judul halaman
		$judul = 'Daftar Laporan Finance Department';

		// Tampung isi database
		$laporan = FinanceLaporan::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.finance-laporan', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman divisi HRDS
	 *
	 * @return View
	 */
	public function getHrds()
	{
		// Tentukan judul halaman
		$judul = 'SLJ HRDS Department';

		// Tampung isi database
		$struktur = HrdsStruktur::all();
		$laporan = HrdsLaporan::orderBy('created_at', 'DESC')->get()->slice(0, 3);
		$sop = HrdsSop::orderBy('created_at', 'DESC')->get()->slice(0, 3);

		// Tampilkan halaman
		return View::make('frontend.divisi.hrds', compact('judul', 'struktur', 'laporan', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi HRDS untuk daftar sop
	 *
	 * @return View
	 */
	public function getHrdsSop()
	{
		// Tentukan judul halaman
		$judul = 'Daftar S.O.P HRDS Department';

		// Tampung isi database
		$sop = HrdsSop::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.hrds-sop', compact('judul', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi HRDS untuk daftar laporan
	 *
	 * @return View
	 */
	public function getHrdsLaporan()
	{
		// Tentukan judul halaman
		$judul = 'Daftar Laporan HRDS Department';

		// Tampung isi database
		$laporan = HrdsLaporan::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.hrds-laporan', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman divisi IT
	 *
	 * @return View
	 */
	public function getIt()
	{
		// Tentukan judul halaman
		$judul = 'SLJ IT Department';

		// Tampung isi database
		$struktur = ItStruktur::all();
		$laporan = ItLaporan::orderBy('created_at', 'DESC')->get()->slice(0, 3);
		$sop = ItSop::orderBy('created_at', 'DESC')->get()->slice(0, 3);

		// Tampilkan halaman
		return View::make('frontend.divisi.it', compact('judul', 'struktur', 'laporan', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi IT untuk daftar sop
	 *
	 * @return View
	 */
	public function getItSop()
	{
		// Tentukan judul halaman
		$judul = 'Daftar S.O.P IT Department';

		// Tampung isi database
		$sop = ItSop::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.it-sop', compact('judul', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi IT untuk daftar laporan
	 *
	 * @return View
	 */
	public function getItLaporan()
	{
		// Tentukan judul halaman
		$judul = 'Daftar Laporan IT Department';

		// Tampung isi database
		$laporan = ItLaporan::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.it-laporan', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman divisi IT untuk daftar team
	 *
	 * @return View
	 */
	public function getItTeam()
	{
		// Tentukan judul halaman
		$judul = 'Team IT Department';

		// Tampung isi database
		$team = ItTeam::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.it-team', compact('judul', 'team'));

	}

	/**
	 * Menampilkan halaman divisi IT untuk daftar software
	 *
	 * @return View
	 */
	public function getItSoftware()
	{
		// Tentukan judul halaman
		$judul = 'Daftar Software IT Department';

		// Tampung isi database
		$laporan = ItSoftware::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.it-software', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman divisi IT untuk daftar IFS
	 *
	 * @return View
	 */
	public function getItIfs()
	{
		// Tentukan judul halaman
		$judul = 'Laporan IFS IT Department';

		// Tampung isi database
		$laporan = ItIfs::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.it-ifs', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman divisi IT untuk daftar non-ifs
	 *
	 * @return View
	 */
	public function getItNonIfs()
	{
		// Tentukan judul halaman
		$judul = 'Laporan Non-IFS IT Department';

		// Tampung isi database
		$laporan = ItNonIfs::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.it-nonifs', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman divisi IT untuk daftar infrastruktur
	 *
	 * @return View
	 */
	public function getItInfrastruktur()
	{
		// Tentukan judul halaman
		$judul = 'Laporan Infrastruktur IT Department';

		// Tampung isi database
		$laporan = ItInfrastruktur::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.it-infrastruktur', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman divisi KP
	 *
	 * @return View
	 */
	public function getKp()
	{
		// Tentukan judul halaman
		$judul = 'SLJ KP Department';

		// Tampung isi database
		$struktur = KpStruktur::all();
		$laporan = KpLaporan::orderBy('created_at', 'DESC')->get()->slice(0, 3);
		$sop = KpSop::orderBy('created_at', 'DESC')->get()->slice(0, 3);

		// Tampilkan halaman
		return View::make('frontend.divisi.kp', compact('judul', 'struktur', 'laporan', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi kp untuk daftar sop
	 *
	 * @return View
	 */
	public function getKpSop()
	{
		// Tentukan judul halaman
		$judul = 'Daftar S.O.P KP Department';

		// Tampung isi database
		$sop = KpSop::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.kp-sop', compact('judul', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi KP untuk daftar laporan
	 *
	 * @return View
	 */
	public function getKpLaporan()
	{
		// Tentukan judul halaman
		$judul = 'Daftar Laporan KP Department';

		// Tampung isi database
		$laporan = KpLaporan::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.kp-laporan', compact('judul', 'laporan'));

	}
	
	/**
	 * Menampilkan halaman divisi logging
	 *
	 * @return View
	 */
	public function getLogging()
	{
		// Tentukan judul halaman
		$judul = 'SLJ Logging Department';

		// Tampung isi database
		$struktur = LoggingStruktur::all();
		$laporan = LoggingLaporan::orderBy('created_at', 'DESC')->get()->slice(0, 3);
		$sop = LoggingSop::orderBy('created_at', 'DESC')->get()->slice(0, 3);

		// Tampilkan halaman
		return View::make('frontend.divisi.logging', compact('judul', 'struktur', 'laporan', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi logging untuk daftar sop
	 *
	 * @return View
	 */
	public function getLoggingSop()
	{
		// Tentukan judul halaman
		$judul = 'Daftar S.O.P Logging Department';

		// Tampung isi database
		$sop = LoggingSop::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.logging-sop', compact('judul', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi corsek untuk daftar laporan
	 *
	 * @return View
	 */
	public function getLoggingLaporan()
	{
		// Tentukan judul halaman
		$judul = 'Daftar Laporan Logging Department';

		// Tampung isi database
		$laporan = LoggingLaporan::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.logging-laporan', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman divisi marketing
	 *
	 * @return View
	 */
	public function getMarketing()
	{
		// Tentukan judul halaman
		$judul = 'SLJ Marketing Department';

		// Tampung isi database
		$struktur = MarketingStruktur::all();
		$laporan = MarketingLaporan::orderBy('created_at', 'DESC')->get()->slice(0, 3);
		$sop = MarketingSop::orderBy('created_at', 'DESC')->get()->slice(0, 3);

		// Tampilkan halaman
		return View::make('frontend.divisi.marketing', compact('judul', 'struktur', 'laporan', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi marketing untuk daftar sop
	 *
	 * @return View
	 */
	public function getMarketingSop()
	{
		// Tentukan judul halaman
		$judul = 'Daftar S.O.P Marketing Department';

		// Tampung isi database
		$sop = MarketingSop::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.marketing-sop', compact('judul', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi marketing untuk daftar laporan
	 *
	 * @return View
	 */
	public function getMarketingLaporan()
	{
		// Tentukan judul halaman
		$judul = 'Daftar Laporan Marketing Department';

		// Tampung isi database
		$laporan = MarketingLaporan::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.marketing-laporan', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman divisi plymill
	 *
	 * @return View
	 */
	public function getPlymill()
	{
		// Tentukan judul halaman
		$judul = 'SLJ Plymill Department';

		// Tampung isi database
		$struktur = PlymillStruktur::all();
		$laporan = PlymillLaporan::orderBy('created_at', 'DESC')->get()->slice(0, 3);
		$sop = PlymillSop::orderBy('created_at', 'DESC')->get()->slice(0, 3);

		// Tampilkan halaman
		return View::make('frontend.divisi.plymill', compact('judul', 'struktur', 'laporan', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi plymill untuk daftar sop
	 *
	 * @return View
	 */
	public function getPlymillSop()
	{
		// Tentukan judul halaman
		$judul = 'Daftar S.O.P Plymill Department';

		// Tampung isi database
		$sop = PlymillSop::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.plymill-sop', compact('judul', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi plymill untuk daftar laporan
	 *
	 * @return View
	 */
	public function getPlymillLaporan()
	{
		// Tentukan judul halaman
		$judul = 'Daftar Laporan Plymill Department';

		// Tampung isi database
		$laporan = PlymillLaporan::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.plymill-laporan', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman divisi procurement
	 *
	 * @return View
	 */
	public function getProcurement()
	{
		// Tentukan judul halaman
		$judul = 'SLJ Procurement Department';

		// Tampung isi database
		$struktur = ProcurementStruktur::all();
		$laporan = ProcurementLaporan::orderBy('created_at', 'DESC')->get()->slice(0, 3);
		$sop = ProcurementSop::orderBy('created_at', 'DESC')->get()->slice(0, 3);

		// Tampilkan halaman
		return View::make('frontend.divisi.procurement', compact('judul', 'struktur', 'laporan', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi corsek untuk daftar sop
	 *
	 * @return View
	 */
	public function getProcurementSop()
	{
		// Tentukan judul halaman
		$judul = 'Daftar S.O.P Procurement Department';

		// Tampung isi database
		$sop = ProcurementSop::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.procurement-sop', compact('judul', 'sop'));

	}

	/**
	 * Menampilkan halaman divisi corsek untuk daftar laporan
	 *
	 * @return View
	 */
	public function getProcurementLaporan()
	{
		// Tentukan judul halaman
		$judul = 'Daftar Laporan Procurement Department';

		// Tampung isi database
		$laporan = ProcurementLaporan::orderBy('created_at', 'DESC')->get();

		// Tampilkan halaman
		return View::make('frontend.divisi.procurement-laporan', compact('judul', 'laporan'));

	}

	/**
	 * Menampilkan halaman berita
	 *
	 * @return View
	 */
	public function getBerita($alias)
	{
		// Tampung isi database
		$berita = Berita::where('alias', '=', $alias)->first();

		// Tampilkan halaman
		return View::make('frontend.divisi.berita-tampil', compact('berita'));

	}
}