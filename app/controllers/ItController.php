<?php

class ItController extends AdminController {

############## SOFTWARE #############################

	/**
	 * Menampilkan halaman daftar software
	 *
	 * @return View
	 */
	public function getSoftware($it = NULL, $divisi = NULL)
	{
		// Tampung isi database
		$it = ItSoftware::orderBy('id', 'DESC')->get();

		// Tentukan folder file unggahan
		$divisi = '../files/it/software/';

		// Jika user bukan dari divi IT
		if(Auth::user()->id != 6)
		{
			// Kembali kehalaman Admin
			return Redirect::to('admin');
		}
		// Jika user dari divisi IT
		return View::make('backend.auth.it.software', compact('it', 'divisi'));
	}

	/**
	 *  Input file ke dalam database
	 *
	 * @return View
	 */
	public function postSoftware()
	{
		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'nama'   	    => 'required',
            'keterangan'    => 'required',
            'file_software' => 'required|mimes:zip,rar,7z'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'nama.required' 	 	 => 'Nama wajib di isi.',
            'keterangan.required'    => 'Keterangan wajib di isi.',
            'file_software.required' => 'File belum di pilih.',
            'file_software.mimes'	 => 'Ekstensi harus :values'
        ];

        // Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        // Simpan nama file
        $file = Input::file('file_software');

        // Jika validasi gagal
        if ($v->fails()) 
        {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('software')->withInput()->withErrors($v);

        } else {

            // Nilai Random
			$r = Str::random(20);
        	
        	// Tentukan direktori tujuan penyimpanan file
	       	$destinationPath = public_path().'/files/it/software/'.$r;

	        // Ambil nama asli file
			$filename = $file->getClientOriginalName();

	        // Buat variabel yang menampung data yg dituju
	        $it = new ItSoftware;

	        // Update data yang di ubah
	        $it->nama          = Input::get('nama');
	        $it->keterangan    = Input::get('keterangan');
	        $it->file_software = Input::get('file_software', $r.'/'.$filename);
	        $it->save();

	        // Simpan file yang akan di upload kedalam server
	        $file->move($destinationPath, $filename);
		        
	        // Kembali ke halaman index dengan pesan sukses
	        return Redirect::route('software')->with('success', 'Software berhasil ditambahkan.');
		}
	}

	/**
	 *  Aksi hapus data dalam database
	 *
	 * @return View
	 */
	public function destroySoftware($idSoftware)
	{
    	// Hapus item berdasarkan id
    	ItSoftware::find($idSoftware)->delete(); 
    	// Tampilkan halaman
    	return Redirect::back()->with('success', 'Software berhasil dihapus.'); 
	}

############## IFS #############################

	/**
	 * Menampilkan halaman daftar IFS
	 *
	 * @return View
	 */
	public function getIfs($it = NULL, $divisi = NULL)
	{
		// Tampung isi database
		$it = ItIfs::orderBy('id', 'DESC')->get();

		// Tentukan folder file unggahan
		$divisi = '../files/it/ifs/';

		// Jika user bukan dari divi IT
		if(Auth::user()->id != 6)
		{
			// Kembali kehalaman Admin
			return Redirect::to('admin');
		}
		// Jika user dari divisi IT
		return View::make('backend.auth.it.ifs', compact('it', 'divisi'));
	}

	/**
	 *  Input file ke dalam database
	 *
	 * @return View
	 */
	public function postIfs()
	{
		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'nama'   	        => 'required',
            'keterangan'        => 'required',
            'file_document_ifs' => 'required|mimes:pdf,xls,xlsx,doc,docx'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'nama.required' 	 	     => 'Nama wajib di isi.',
            'keterangan.required'        => 'Keterangan wajib di isi.',
            'file_document_ifs.required' => 'File belum di pilih.',
            'file_document_ifs.mimes'	 => 'Ekstensi harus :values'
        ];

        // Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        // Simpan nama file
        $file = Input::file('file_document_ifs');

        // Jika validasi gagal
        if ($v->fails()) 
        {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('ifs')->withInput()->withErrors($v);

        } else {

            // Nilai Random
			$r = Str::random(20);
        	
        	// Tentukan direktori tujuan penyimpanan file
	       	$destinationPath = public_path().'/files/it/ifs/'.$r;

	        // Ambil nama asli file
			$filename = $file->getClientOriginalName();

	        // Buat variabel yang menampung data yg dituju
	        $it = new ItIfs;

	        // Update data yang di ubah
	        $it->nama        	   = Input::get('nama');
	        $it->keterangan        = Input::get('keterangan');
	        $it->file_document_ifs = Input::get('file_document_ifs', $r.'/'.$filename);
	        $it->save();

	        // Simpan file yang akan di upload kedalam server
	        $file->move($destinationPath, $filename);
		        
	        // Kembali ke halaman index dengan pesan sukses
	        return Redirect::route('ifs')->with('success', 'Dokumen IFS berhasil ditambahkan.');
		}
	}

	/**
	 *  Aksi hapus data dalam database
	 *
	 * @return View
	 */
	public function destroyIfs($idIfs)
	{
		// Hapus item berdasarkan id
    	ItIfs::find($idIfs)->delete(); 
    	// Tampilkan halaman
    	return Redirect::back()->with('success', 'File IFS berhasil dihapus.'); 
	}

############## NON IFS #############################

	/**
	 * Menampilkan halaman daftar Non IFS
	 *
	 * @return View
	 */
	public function getNonIfs($it = NULL, $divisi = NULL)
	{
		// Tampung isi database
		$it = ItNonIfs::orderBy('id', 'DESC')->get();

		// Tentukan folder file unggahan
		$divisi = '../files/it/non-ifs/';

		// Jika user bukan dari divi IT
		if(Auth::user()->id != 6)
		{
			// Kembali kehalaman Admin
			return Redirect::to('admin');
		}
		// Jika user dari divisi IT
		return View::make('backend.auth.it.nonifs', compact('it', 'divisi'));
	}

	/**
	 *  Input file ke dalam database
	 *
	 * @return View
	 */
	public function postNonIfs()
	{
		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'nama'   	           => 'required',
            'keterangan'           => 'required',
            'file_document_nonifs' => 'required|mimes:pdf,xls,xlsx,doc,docx'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'nama.required' 	 	        => 'Nama wajib di isi.',
            'keterangan.required'           => 'Keterangan wajib di isi.',
            'file_document_nonifs.required' => 'File belum di pilih.',
            'file_document_nonifs.mimes'    => 'Ekstensi harus :values'
        ];

        // Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        // Simpan nama file
        $file = Input::file('file_document_nonifs');

        // Jika validasi gagal
        if ($v->fails()) 
        {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('nonifs')->withInput()->withErrors($v);

        } else {

            // Nilai Random
			$r = Str::random(20);
        	
        	// Tentukan direktori tujuan penyimpanan file
	       	$destinationPath = public_path().'/files/it/non-ifs/'.$r;

	        // Ambil nama asli file
			$filename = $file->getClientOriginalName();

	        // Buat variabel yang menampung data yg dituju
	        $it = new ItNonIfs;

	        // Update data yang di ubah
	        $it->nama        	      = Input::get('nama');
	        $it->keterangan           = Input::get('keterangan');
	        $it->file_document_nonifs = Input::get('file_document_nonifs', $r.'/'.$filename);
	        $it->save();

	        // Simpan file yang akan di upload kedalam server
	        $file->move($destinationPath, $filename);
		        
	        // Kembali ke halaman index dengan pesan sukses
	        return Redirect::route('nonifs')->with('success', 'Dokumen Non-IFS berhasil ditambahkan.');
		}
	}

	/**
	 *  Aksi hapus data dalam database
	 *
	 * @return View
	 */
	public function destroyNonIfs($idNonIfs)
	{
		// Hapus item berdasarkan id
    	ItNonIfs::find($idNonIfs)->delete(); 
    	// Tampilkan halaman
    	return Redirect::back()->with('success', 'File Non-IFS berhasil dihapus.'); 
	}

############## INFRASTRUKTUR #############################

	/**
	 * Menampilkan halaman daftar infrastruktur
	 *
	 * @return View
	 */
	public function getInfrastruktur($it = NULL, $divisi = NULL)
	{
		// Tampung isi database
		$it = ItInfrastruktur::orderBy('id', 'DESC')->get();

		// Tentukan folder file unggahan
		$divisi = '../files/it/infrastruktur/';

		// Jika user bukan dari divi IT
		if(Auth::user()->id != 6)
		{
			// Kembali kehalaman Admin
			return Redirect::to('admin');
		}
		// Jika user dari divisi IT
		return View::make('backend.auth.it.infrastruktur', compact('it', 'divisi'));
	}

	/**
	 *  Input file ke dalam database
	 *
	 * @return View
	 */
	public function postInfrastruktur()
	{
		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'nama'   	                  => 'required',
            'keterangan'       	          => 'required',
            'file_document_infrastruktur' => 'required|mimes:pdf,xls,xlsx,doc,docx'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'nama.required' 	 	               => 'Nama wajib di isi.',
            'keterangan.required'                  => 'Keterangan wajib di isi.',
            'file_document_infrastruktur.required' => 'File belum di pilih.',
            'file_document_infrastruktur.mimes'	   => 'Ekstensi harus :values'
        ];

        // Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        // Simpan nama file
        $file = Input::file('file_document_infrastruktur');

        // Jika validasi gagal
        if ($v->fails()) 
        {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('infrastruktur')->withInput()->withErrors($v);

        } else {

            // Nilai Random
			$r = Str::random(20);
        	
        	// Tentukan direktori tujuan penyimpanan file
	       	$destinationPath = public_path().'/files/it/infrastruktur/'.$r;

	        // Ambil nama asli file
			$filename = $file->getClientOriginalName();

	        // Buat variabel yang menampung data yg dituju
	        $it = new ItInfrastruktur;

	        // Update data yang di ubah
	        $it->nama        	  			 = Input::get('nama');
	        $it->keterangan       			 = Input::get('keterangan');
	        $it->file_document_infrastruktur = Input::get('file_document_infrastruktur', $r.'/'.$filename);
	        $it->save();

	        // Simpan file yang akan di upload kedalam server
	        $file->move($destinationPath, $filename);
		        
	        // Kembali ke halaman index dengan pesan sukses
	        return Redirect::route('infrastruktur')->with('success', 'Dokumen Infrastruktur berhasil ditambahkan.');
		}
	}

	/**
	 *  Aksi hapus data dalam database
	 *
	 * @return View
	 */
	public function destroyInfrastruktur($idInfrastruktur)
	{
		// Hapus item berdasarkan id
    	ItInfrastruktur::find($idInfrastruktur)->delete(); 
    	// Tampilkan halaman
    	return Redirect::back()->with('success', 'File Infrastruktur berhasil dihapus.'); 
	}

############## TEAM IT #############################

	/**
	 * Menampilkan halaman daftar Team
	 *
	 * @return View
	 */
	public function getTeam($it = NULL, $divisi = NULL)
	{
		// Tampung isi database
		$it = ItTeam::orderBy('id', 'DESC')->get();

		// Tentukan folder file unggahan
		$divisi = '../files/it/avatar/';

		// Jika user bukan dari divi IT
		if(Auth::user()->id != 6)
		{
			// Kembali kehalaman Admin
			return Redirect::to('admin');
		}
		// Jika user dari divisi IT
		return View::make('backend.auth.it.team', compact('it', 'divisi'));
	}

	/**
	 *  Input file ke dalam database
	 *
	 * @return View
	 */
	public function postTeam()
	{
		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'nama'   	        => 'required',
            'nip'   	        => 'required',
            'jabatan'   	    => 'required',
            'status'   	        => 'required',
            'email'   	        => 'required|email',
            'telp'   	        => 'required',
            'photo'   	        => 'required|mimes:jpg,png,jpeg'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'nama.required' 	=> 'Nama belum di isi.',
            'nip.required' 	 	=> 'NIP belum di isi.',
            'jabatan.required' 	=> 'Jabatan belum di isi.',
            'status.required' 	=> 'Status belum di isi.',
            'email.required' 	=> 'Email belum di isi.',
            'email.email' 	 	=> 'Format email salah.',
            'telp.required' 	=> 'Nomor telpon belum di isi.',
            'photo.required' 	=> 'Photo belum di tentukan.',
            'photo.mimes' 	 	=> 'Format photo harus :values.'
        ];

        // Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        // Simpan nama file
        $file = Input::file('photo');

        // Jika validasi gagal
        if ($v->fails()) 
        {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('team')->withInput()->withErrors($v);

        } else {

            // Nilai Random
			$r = Str::random(20);
        	
        	// Tentukan direktori tujuan penyimpanan file
	       	$destinationPath = public_path().'/files/it/avatar/'.$r;

	        // Ambil nama asli file
			$filename = $file->getClientOriginalName();

	        // Buat variabel yang menampung data yg dituju
	        $it = new ItTeam;

	        // Update data yang di ubah
	        $it->nama       = Input::get('nama');
	        $it->nip        = Input::get('nip');
	        $it->jabatan    = Input::get('jabatan');
	        $it->status     = Input::get('status');
	        $it->email      = Input::get('email');
	        $it->telp       = Input::get('telp');
	        $it->keterangan = Input::get('keterangan');
	        $it->photo 		= Input::get('photo', $r.'/'.$filename);
	        $it->save();

	        // Simpan file yang akan di upload kedalam server
	        $file->move($destinationPath, $filename);
		        
	        // Kembali ke halaman index dengan pesan sukses
	        return Redirect::route('team')->with('success', 'Team IT baru berhasil ditambahkan.');
		}
	}

	/**
	 *  Aksi update data dalam database
	 *
	 * @return View
	 */
	public function putTeam($idTeam)
	{
		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'nama'   	        => 'required',
            'nip'   	        => 'required',
            'jabatan'   	    => 'required',
            'status'   	        => 'required',
            'email'   	        => 'required|email',
            'telp'   	        => 'required',
            'photo'   	        => 'required|mimes:jpg,png,jpeg'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'nama.required' 	=> 'Nama belum di isi.',
            'nip.required' 	 	=> 'NIP belum di isi.',
            'jabatan.required' 	=> 'Jabatan belum di isi.',
            'status.required' 	=> 'Status belum di isi.',
            'email.required' 	=> 'Email belum di isi.',
            'email.email' 	 	=> 'Format email salah.',
            'telp.required' 	=> 'Nomor telpon belum di isi.',
            'photo.required' 	=> 'Photo belum di tentukan.',
            'photo.mimes' 	 	=> 'Format photo harus :values.'
        ];

        // Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        // Simpan nama file
        $file = Input::file('photo');

        // Jika validasi gagal
        if ($v->fails()) 
        {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('team')->withInput()->withErrors($v);

        } else {

            // Nilai Random
			$r = Str::random(20);
        	
        	// Tentukan direktori tujuan penyimpanan file
	       	$destinationPath = public_path().'/files/it/avatar/'.$r;

	        // Ambil nama asli file
			$filename = $file->getClientOriginalName();

	        // Buat variabel yang menampung data yg dituju
	        $it = ItTeam::find($idTeam);

	        // Update data yang di ubah
	        $it->nama       = Input::get('nama');
	        $it->nip        = Input::get('nip');
	        $it->jabatan    = Input::get('jabatan');
	        $it->status     = Input::get('status');
	        $it->email      = Input::get('email');
	        $it->telp       = Input::get('telp');
	        $it->keterangan = Input::get('keterangan');
	        $it->photo 		= Input::get('photo', $r.'/'.$filename);
	        $it->save();

	        // Simpan file yang akan di upload kedalam server
	        $file->move($destinationPath, $filename);
		        
	        // Kembali ke halaman index dengan pesan sukses
	        return Redirect::route('team')->with('success', 'Team IT baru berhasil ditambahkan.');
		}
	}

	/**
	 *  Aksi hapus data dalam database
	 *
	 * @return View
	 */
	public function destroyTeam($idTeam)
	{
		// Hapus item berdasarkan id
    	ItTeam::find($idTeam)->delete(); 
    	// Tampilkan halaman
    	return Redirect::back()->with('success', 'Member IT Team berhasil dihapus.'); 
	}

############## EMAIL #############################

	/**
	 * Menampilkan halaman daftar email
	 *
	 * @return View
	 */
	public function getEmail($it = NULL)
	{
		// Tampung isi database
		$it = ItEmail::orderBy('id', 'DESC')->get();

		// Jika user bukan dari divi IT
		if(Auth::user()->id != 6)
		{
			// Kembali kehalaman Admin
			return Redirect::to('admin');
		}
		// Jika user dari divisi IT
		return View::make('backend.auth.it.email', compact('it'));
	}

	/**
	 *  Input file ke dalam database
	 *
	 * @return View
	 */
	public function postEmail()
	{
		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'nama'   => 'required',
            'divisi' => 'required',
            'email'  => 'required|email'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'nama.required'   => 'Nama wajib di isi.',
            'divisi.required' => 'Divisi belum di isi.',
            'email.required'  => 'Email belum di pilih.',
            'email.email'	  => 'Format Email salah'
        ];

        // Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        // Jika validasi gagal
        if ($v->fails()) 
        {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('backendemail')->withInput()->withErrors($v);

        } else {

	        // Buat variabel yang menampung data yg dituju
	        $it = new ItEmail;

	        // Update data yang di ubah
	        $it->nama    = Input::get('nama');
	        $it->divisi  = Input::get('divisi');
	        $it->email   = Input::get('email');
	        $it->save();
		        
	        // Kembali ke halaman index dengan pesan sukses
	        return Redirect::route('backendemail')->with('success', 'Email baru berhasil ditambahkan.');
		}
	}

	/**
	 *  Aksi update data dalam database
	 *
	 * @return View
	 */
	public function putEmail($idEmail)
	{
		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'nama'   => 'required',
            'divisi' => 'required',
            'email'  => 'required|email'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'nama.required'   => 'Nama wajib di isi.',
            'divisi.required' => 'Divisi belum di isi.',
            'email.required'  => 'Email belum di pilih.',
            'email.email'	  => 'Format Email salah'
        ];

        // Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        // Jika validasi gagal
        if ($v->fails()) 
        {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('backendemail')->withInput()->withErrors($v);

        } else {

	        // Buat variabel yang menampung data yg dituju
	        $it = ItEmail::find($idEmail);

	        // Update data yang di ubah
	        $it->nama    = Input::get('nama');
	        $it->divisi  = Input::get('divisi');
	        $it->email   = Input::get('email');
	        $it->save();
		        
	        // Kembali ke halaman index dengan pesan sukses
	        return Redirect::route('backendemail')->with('success', 'Email baru berhasil diubah.');
		}
	}

	/**
	 *  Aksi hapus data dalam database
	 *
	 * @return View
	 */
	public function destroyEmail($idEmail)
	{
		// Hapus item berdasarkan id
    	ItEmail::find($idEmail)->delete(); 
    	// Tampilkan halaman
    	return Redirect::back()->with('success', 'Email berhasil dihapus.'); 
	}

}