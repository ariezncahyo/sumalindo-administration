<?php

class BackendController extends AdminController {

	/**
	 * Menampilkan halaman struktur divisi
	 *
	 * @return View
	 */
	public function getStruktur($gambar=NULL, $struktur=NULL)
	{
		$gambar = '../addon/images/';

		// Jika Login sebagai divisi Audit
		if (Auth::user()->id==2) {

			// Tampung isi database
			$struktur = AuditStruktur::find(1);

			// Tampilkan halaman
			return View::make('backend.auth.struktur', compact('struktur', 'gambar'));
		}

		// Jika login sebagai divisi corsek
		elseif (Auth::user()->id==3) {
			
			// Tampung isi database
			$struktur = CorsekStruktur::find(1);

			// Tampilkan halaman
			return View::make('backend.auth.struktur', compact('struktur', 'gambar'));
		}

		// Jika login sebagai divisi finance
		elseif (Auth::user()->id==4) {
			
			// Tampung isi database
			$struktur = FinanceStruktur::find(1);

			// Tampilkan halaman
			return View::make('backend.auth.struktur', compact('struktur', 'gambar'));
		}

		// Jika login sebagai divisi HRDS
		elseif (Auth::user()->id==5) {
			
			// Tampung isi database
			$struktur = HrdsStruktur::find(1);

			// Tampilkan halaman
			return View::make('backend.auth.struktur', compact('struktur', 'gambar'));
		}

		// Jika login sebagai divisi IT
		elseif (Auth::user()->id==6) {
			
			// Tampung isi database
			$struktur = ItStruktur::find(1);

			// Tampilkan halaman
			return View::make('backend.auth.struktur', compact('struktur', 'gambar'));
		}

		// Jika login sebagai divisi KP
		elseif (Auth::user()->id==7) {
			
			// Tampung isi database
			$struktur = KpStruktur::find(1);

			// Tampilkan halaman
			return View::make('backend.auth.struktur', compact('struktur', 'gambar'));
		}

		// Jika login sebagai divisi Logging
		elseif (Auth::user()->id==8) {
			
			// Tampung isi database
			$struktur = LoggingStruktur::find(1);

			// Tampilkan halaman
			return View::make('backend.auth.struktur', compact('struktur', 'gambar'));
		}

		// Jika login sebagai divisi Marketing
		elseif (Auth::user()->id==9) {
			
			// Tampung isi database
			$struktur = MarketingStruktur::find(1);

			// Tampilkan halaman
			return View::make('backend.auth.struktur', compact('struktur', 'gambar'));
		}

		// Jika login sebagai divisi plymill
		elseif (Auth::user()->id==10) {
			
			// Tampung isi database
			$struktur = PlymillStruktur::find(1);

			// Tampilkan halaman
			return View::make('backend.auth.struktur', compact('struktur', 'gambar'));
		}

		// Jika login sebagai divisi Procurement
		elseif (Auth::user()->id==11) {
			
			// Tampung isi database
			$struktur = ProcurementStruktur::find(1);

			// Tampilkan halaman
			return View::make('backend.auth.struktur', compact('struktur', 'gambar'));
		}
	}

	/**
	 * Update struktur
	 *
	 * @return View
	 */
	public function putStruktur()
	{
		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'keterangan' => 'required',
            'foto'       => 'required'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'keterangan.required' => 'Field keterangan Masih Kosong.',
            'foto.required' 	  => 'Foto masih kosong.'
        ];

        // Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        // Simpan nama file
        $file = Input::file('foto');

        if ($v->fails()) 
        {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('struktur')->withInput()->withErrors($v);

        } else {

        	// Nilai Random
			$r = Str::random(20);

        	// Tentukan direktori tujuan penyimpanan file
	       	$destinationPath = public_path().'/addon/images/'.$r;

	       	// Ambil nama asli file
			$filename = $file->getClientOriginalName();

        	if(Auth::user()->id == 2)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = AuditStruktur::find(1);

		        // Update data yang di ubah
		        $it->keterangan = Input::get('keterangan');
		        $it->foto       = Input::get('foto', $r.'/'.$filename);
		        $it->save();

		        // Simpan file yang akan di upload kedalam server
	        	$file->move($destinationPath, $filename);
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('struktur')->with('success', 'Perubahan struktur berhasil.');
        	}

        	elseif(Auth::user()->id == 3)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = CorsekStruktur::find(1);

		        // Update data yang di ubah
		        $it->keterangan = Input::get('keterangan');
		        $it->foto       = Input::get('foto', $r.'/'.$filename);
		        $it->save();

		        // Simpan file yang akan di upload kedalam server
	        	$file->move($destinationPath, $filename);
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('struktur')->with('success', 'Perubahan struktur berhasil.');
        	}

        	elseif(Auth::user()->id == 4)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = FinanceStruktur::find(1);

		        // Update data yang di ubah
		        $it->keterangan = Input::get('keterangan');
		        $it->foto       = Input::get('foto', $r.'/'.$filename);
		        $it->save();

		        // Simpan file yang akan di upload kedalam server
	        	$file->move($destinationPath, $filename);
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('struktur')->with('success', 'Perubahan struktur berhasil.');
        	}

        	elseif(Auth::user()->id == 5)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = HrdsStruktur::find(1);

		        // Update data yang di ubah
		        $it->keterangan = Input::get('keterangan');
		        $it->foto       = Input::get('foto', $r.'/'.$filename);
		        $it->save();

		        // Simpan file yang akan di upload kedalam server
	        	$file->move($destinationPath, $filename);
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('struktur')->with('success', 'Perubahan struktur berhasil.');
        	}

        	elseif(Auth::user()->id == 6)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = ItStruktur::find(1);

		        // Update data yang di ubah
		        $it->keterangan = Input::get('keterangan');
		        $it->foto       = Input::get('foto', $r.'/'.$filename);
		        $it->save();

		        // Simpan file yang akan di upload kedalam server
	        	$file->move($destinationPath, $filename);
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('struktur')->with('success', 'Perubahan struktur berhasil.');
        	}

        	elseif(Auth::user()->id == 7)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = KpStruktur::find(1);

		        // Update data yang di ubah
		        $it->keterangan = Input::get('keterangan');
		        $it->foto       = Input::get('foto', $r.'/'.$filename);
		        $it->save();

		        // Simpan file yang akan di upload kedalam server
	        	$file->move($destinationPath, $filename);
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('struktur')->with('success', 'Perubahan struktur berhasil.');
        	}

        	elseif(Auth::user()->id == 8)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = LoggingStruktur::find(1);

		        // Update data yang di ubah
		        $it->keterangan = Input::get('keterangan');
		        $it->foto       = Input::get('foto', $r.'/'.$filename);
		        $it->save();

		        // Simpan file yang akan di upload kedalam server
	        	$file->move($destinationPath, $filename);
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('struktur')->with('success', 'Perubahan struktur berhasil.');
        	}

        	elseif(Auth::user()->id == 9)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = MarketingStruktur::find(1);

		        // Update data yang di ubah
		        $it->keterangan = Input::get('keterangan');
		        $it->foto       = Input::get('foto', $r.'/'.$filename);
		        $it->save();

		        // Simpan file yang akan di upload kedalam server
	        	$file->move($destinationPath, $filename);
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('struktur')->with('success', 'Perubahan struktur berhasil.');
        	}

        	elseif(Auth::user()->id == 10)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = PlymillStruktur::find(1);

		        // Update data yang di ubah
		        $it->keterangan = Input::get('keterangan');
		        $it->foto       = Input::get('foto', $r.'/'.$filename);
		        $it->save();

		        // Simpan file yang akan di upload kedalam server
	        	$file->move($destinationPath, $filename);
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('struktur')->with('success', 'Perubahan struktur berhasil.');
        	}

        	elseif(Auth::user()->id == 11)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = ProcurementStruktur::find(1);

		        // Update data yang di ubah
		        $it->keterangan = Input::get('keterangan');
		        $it->foto       = Input::get('foto', $r.'/'.$filename);
		        $it->save();

		        // Simpan file yang akan di upload kedalam server
	        	$file->move($destinationPath, $filename);
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('struktur')->with('success', 'Perubahan struktur berhasil.');
        	}
        }
	}

	/**
	 * Menampilkan halaman profil
	 *
	 * @return View
	 */
	public function getProfil()
	{
		if(Auth::user()->id == 2)
		{
			$user = User::find(2);
			return View::make('backend.auth.profil', compact('user'));
		}

		elseif(Auth::user()->id == 3)
		{
			$user = User::find(3);
			return View::make('backend.auth.profil', compact('user'));
		}

		elseif(Auth::user()->id == 4)
		{
			$user = User::find(4);
			return View::make('backend.auth.profil', compact('user'));
		}

		elseif(Auth::user()->id == 5)
		{
			$user = User::find(5);
			return View::make('backend.auth.profil', compact('user'));
		}

		elseif(Auth::user()->id == 6)
		{
			$user = User::find(6);
			return View::make('backend.auth.profil', compact('user'));
		}

		elseif(Auth::user()->id == 7)
		{
			$user = User::find(7);
			return View::make('backend.auth.profil', compact('user'));
		}

		elseif(Auth::user()->id == 8)
		{
			$user = User::find(8);
			return View::make('backend.auth.profil', compact('user'));
		}

		elseif(Auth::user()->id == 9)
		{
			$user = User::find(9);
			return View::make('backend.auth.profil', compact('user'));
		}

		elseif(Auth::user()->id == 10)
		{
			$user = User::find(10);
			return View::make('backend.auth.profil', compact('user'));
		}

		elseif(Auth::user()->id == 11)
		{
			$user = User::find(11);
			return View::make('backend.auth.profil', compact('user'));
		}

	}

	/**
	 * Menampilkan halaman profil
	 *
	 * @return View
	 */
	public function putProfil()
	{
		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'username.required' => 'Anda belum mengisi field Nama Pengguna.',
            'password.required' => 'Password masih kosong.'
        ];

        // Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        if ($v->fails()) 
        {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('profil')->withInput()->withErrors($v);

        } else {

        	if(Auth::user()->id == 2)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = User::find(2);

		        // Update data yang di ubah
		        $it->username = Input::get('username');
		        $it->password = Hash::make(Input::get('password'));
		        $it->save();
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('profil')->with('success', 'Perubahan akun berhasil.');
        	}

        	elseif(Auth::user()->id == 3)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = User::find(3);

		        // Update data yang di ubah
		        $it->username = Input::get('username');
		        $it->password = Hash::make(Input::get('password'));
		        $it->save();
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('profil')->with('success', 'Perubahan akun berhasil.');
        	}
	        
	        elseif(Auth::user()->id == 4)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = User::find(4);

		        // Update data yang di ubah
		        $it->username = Input::get('username');
		        $it->password = Hash::make(Input::get('password'));
		        $it->save();
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('profil')->with('success', 'Perubahan akun berhasil.');
        	}

        	elseif(Auth::user()->id == 5)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = User::find(5);

		        // Update data yang di ubah
		        $it->username = Input::get('username');
		        $it->password = Hash::make(Input::get('password'));
		        $it->save();
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('profil')->with('success', 'Perubahan akun berhasil.');
        	}

        	elseif(Auth::user()->id == 6)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = User::find(6);

		        // Update data yang di ubah
		        $it->username = Input::get('username');
		        $it->password = Hash::make(Input::get('password'));
		        $it->save();
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('profil')->with('success', 'Perubahan akun berhasil.');
        	}

        	elseif(Auth::user()->id == 7)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = User::find(7);

		        // Update data yang di ubah
		        $it->username = Input::get('username');
		        $it->password = Hash::make(Input::get('password'));
		        $it->save();
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('profil')->with('success', 'Perubahan akun berhasil.');
        	}

        	elseif(Auth::user()->id == 8)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = User::find(8);

		        // Update data yang di ubah
		        $it->username = Input::get('username');
		        $it->password = Hash::make(Input::get('password'));
		        $it->save();
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('profil')->with('success', 'Perubahan akun berhasil.');
        	}

        	elseif(Auth::user()->id == 9)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = User::find(9);

		        // Update data yang di ubah
		        $it->username = Input::get('username');
		        $it->password = Hash::make(Input::get('password'));
		        $it->save();
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('profil')->with('success', 'Perubahan akun berhasil.');
        	}

        	elseif(Auth::user()->id == 10)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = User::find(10);

		        // Update data yang di ubah
		        $it->username = Input::get('username');
		        $it->password = Hash::make(Input::get('password'));
		        $it->save();
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('profil')->with('success', 'Perubahan akun berhasil.');
        	}

        	elseif(Auth::user()->id == 11)
        	{
        		// Buat variabel yang menampung data yg dituju
		        $it = User::find(11);

		        // Update data yang di ubah
		        $it->username = Input::get('username');
		        $it->password = Hash::make(Input::get('password'));
		        $it->save();
			        
		        // Kembali ke halaman index dengan pesan sukses
		        return Redirect::route('profil')->with('success', 'Perubahan akun berhasil.');
        	}
		}
	}

	/**
	 * Menampilkan halaman profil
	 *
	 * @return View
	 */
	public function postBerita()
	{	
		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'judul'   	 => 'required',
            'isi_berita' => 'required',
            'gambar' 	 => 'required|mimes:jpg,png,jpeg'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'judul.required' 	 	=> 'Nama wajib di isi.',
            'isi_berita.required'   => 'Keterangan wajib di isi.',
            'gambar.required' 		=> 'File belum di pilih.',
            'gambar.mimes'	 		=> 'Ekstensi harus :values'
        ];

			
		// Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        // Simpan nama file
        $file = Input::file('gambar');

        // Jika validasi gagal
        if ($v->fails()) 
        {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('admin')->withInput()->withErrors($v);

        } else {

            // Nilai Random
			$r = Str::random(20);
        	
        	// Tentukan direktori tujuan penyimpanan file
	       	$destinationPath = public_path().'/files/berita/'.$r;

	        // Ambil nama asli file
			$filename = $file->getClientOriginalName();

	        // Buat variabel yang menampung data yg dituju
	        $beritait = new Berita;

	        // Update data yang di ubah
	        $beritait->judul      = Input::get('judul');
	        $beritait->isi_berita = Input::get('isi_berita');
	        $beritait->alias 	  = Str::slug(Input::get('judul'));
	        $beritait->id_user 	  = Auth::user()->id;
	        $beritait->gambar 	  = Input::get('gambar', $r.'/'.$filename);
	        $beritait->save();

	        // Simpan file yang akan di upload kedalam server
	        $file->move($destinationPath, $filename);
		        
	        // Kembali ke halaman index dengan pesan sukses
	        return Redirect::route('admin')->with('success', 'Berita berhasil ditambahkan.');
		}
		
	}

	/**
	 *  Aksi hapus data dalam database
	 *
	 * @return View
	 */
	public function destroyBerita($idBerita)
	{
		// Jika user bukan dari divi IT
		if(Auth::user()->id != 6)
		{
			// Kembali kehalaman Admin
			return Redirect::to('admin');
		}
    	// Hapus item berdasarkan id
    	Berita::find($idBerita)->delete(); 
    	// Tampilkan halaman
    	return Redirect::back()->with('success', 'Berita berhasil dihapus.'); 
	}

}