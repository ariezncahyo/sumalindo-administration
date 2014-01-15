<?php

class LaporanController extends AdminController {

	/**
	 * Menampilkan halaman daftar laporan
	 *
	 * @return View
	 */
	public function getLaporan($laporan = NULL, $divisi = NULL)
	{
		// Jika Login sebagai divisi Audit
		if (Auth::user()->id==2) {

			// Tampung isi database
			$laporan = AuditLaporan::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/audit/laporan/';

			// Tampilkan halaman
			return View::make('backend.auth.laporan', compact('laporan', 'divisi'));

		}

		// Jika login sebagai divisi corsek
		elseif (Auth::user()->id==3) {
			
			// Tampung isi database
			$laporan = CorsekLaporan::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/corsek/laporan/';

			// Tampilkan halaman
			return View::make('backend.auth.laporan', compact('laporan', 'divisi'));
		}

		// Jika login sebagai divisi finance
		elseif (Auth::user()->id==4) {
			
			// Tampung isi database
			$laporan = FinanceLaporan::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/finance/laporan/';

			// Tampilkan halaman
			return View::make('backend.auth.laporan', compact('laporan', 'divisi'));
		}

		// Jika login sebagai divisi HRDS
		elseif (Auth::user()->id==5) {
			
			// Tampung isi database
			$laporan = HrdsLaporan::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/hrds/laporan/';

			// Tampilkan halaman
			return View::make('backend.auth.laporan', compact('laporan', 'divisi'));
		}

		// Jika login sebagai divisi IT
		elseif (Auth::user()->id==6) {
			
			// Tampung isi database
			$laporan = ItLaporan::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/it/laporan/';

			// Tampilkan halaman
			return View::make('backend.auth.laporan', compact('laporan', 'divisi'));
		}

		// Jika login sebagai divisi KP
		elseif (Auth::user()->id==7) {
			
			// Tampung isi database
			$laporan = KpLaporan::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/kp/laporan/';

			// Tampilkan halaman
			return View::make('backend.auth.laporan', compact('laporan', 'divisi'));
		}

		// Jika login sebagai divisi Logging
		elseif (Auth::user()->id==8) {
			
			// Tampung isi database
			$laporan = LoggingLaporan::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/logging/laporan/';

			// Tampilkan halaman
			return View::make('backend.auth.laporan', compact('laporan', 'divisi'));
		}

		// Jika login sebagai divisi Marketing
		elseif (Auth::user()->id==9) {
			
			// Tampung isi database
			$laporan = MarketingLaporan::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/marketing/laporan/';

			// Tampilkan halaman
			return View::make('backend.auth.laporan', compact('laporan', 'divisi'));
		}

		// Jika login sebagai divisi plymill
		elseif (Auth::user()->id==10) {
			
			// Tampung isi database
			$laporan = PlymillLaporan::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/plymill/laporan/';

			// Tampilkan halaman
			return View::make('backend.auth.laporan', compact('laporan', 'divisi'));
		}

		// Jika login sebagai divisi Procurement
		elseif (Auth::user()->id==11) {
			
			// Tampung isi database
			$laporan = ProcurementLaporan::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/procurement/laporan/';

			// Tampilkan halaman
			return View::make('backend.auth.laporan', compact('laporan', 'divisi'));
		}
	}

	/**
	 *  Input file ke dalam database
	 *
	 * @return View
	 */
	public function postLaporan()
	{

		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'nama'   	   => 'required',
            'keterangan'   => 'required',
            'file_laporan' => 'required|mimes:pdf,xls,xlsx,doc,docx'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'nama.required' 	 	=> 'Nama wajib di isi.',
            'keterangan.required' 	=> 'Keterangan wajib di isi.',
            'file_laporan.required' => 'File belum di pilih.',
            'file_laporan.mimes'	=> 'Ekstensi harus :values'
        ];

        // Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        // Simpan nama file
        $file = Input::file('file_laporan');

        // Jika validasi gagal
        if ($v->fails()) {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('laporan')->withInput()->withErrors($v);

        } else {

        	// Nilai Random
			$r = Str::random(20);

        	// Jika Login sebagai divisi Audit
			if (Auth::user()->id==2) {
        	
        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/audit/laporan/'.$r;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new AuditLaporan;

		        // Update data sop yang di ubah
		        $sop->nama         = Input::get('nama');
		        $sop->keterangan   = Input::get('keterangan');
		        $sop->file_laporan = Input::get('file_laporan', $r.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('laporan')->with('success', 'File Laporan baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi Corsek
			elseif (Auth::user()->id==3) {
        	
        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/corsek/laporan/'.$r;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new CorsekLaporan;

		        // Update data sop yang di ubah
		        $sop->nama         = Input::get('nama');
		        $sop->keterangan   = Input::get('keterangan');
		        $sop->file_laporan = Input::get('file_laporan', $r.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('laporan')->with('success', 'File Laporan baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi Finance
			elseif (Auth::user()->id==4) {
        	
        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/finance/laporan/'.$r;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new FinanceLaporan;

		        // Update data sop yang di ubah
		        $sop->nama         = Input::get('nama');
		        $sop->keterangan   = Input::get('keterangan');
		        $sop->file_laporan = Input::get('file_laporan', $r.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('laporan')->with('success', 'File Laporan baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi HRDS
			elseif (Auth::user()->id==5) {
        	
        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/hrds/laporan/'.$r;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new HrdsLaporan;

		        // Update data sop yang di ubah
		        $sop->nama         = Input::get('nama');
		        $sop->keterangan   = Input::get('keterangan');
		        $sop->file_laporan = Input::get('file_laporan', $r.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('laporan')->with('success', 'File Laporan baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi IT
			elseif (Auth::user()->id==6) {
        	
        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/it/laporan/'.$r;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new ItLaporan;

		        // Update data sop yang di ubah
		        $sop->nama         = Input::get('nama');
		        $sop->keterangan   = Input::get('keterangan');
		        $sop->file_laporan = Input::get('file_laporan', $r.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('laporan')->with('success', 'File Laporan baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi KP
			elseif (Auth::user()->id==7) {
        	
        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/kp/laporan/'.$r;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new KpLaporan;

		        // Update data sop yang di ubah
		        $sop->nama         = Input::get('nama');
		        $sop->keterangan   = Input::get('keterangan');
		        $sop->file_laporan = Input::get('file_laporan', $r.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('laporan')->with('success', 'File Laporan baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi Logging
			elseif (Auth::user()->id==8) {
        	
        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/logging/laporan/'.$r;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new LoggingLaporan;

		        // Update data sop yang di ubah
		        $sop->nama         = Input::get('nama');
		        $sop->keterangan   = Input::get('keterangan');
		        $sop->file_laporan = Input::get('file_laporan', $r.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('laporan')->with('success', 'File Laporan baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi Marketing
			elseif (Auth::user()->id==9) {
        	
        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/marketing/laporan/'.$r;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new MarketingLaporan;

		        // Update data sop yang di ubah
		        $sop->nama         = Input::get('nama');
		        $sop->keterangan   = Input::get('keterangan');
		        $sop->file_laporan = Input::get('file_laporan', $r.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('laporan')->with('success', 'File Laporan baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi Plymill
			elseif (Auth::user()->id==10) {
        	
        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/plymill/laporan/'.$r;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new PlymillLaporan;

		        // Update data sop yang di ubah
		        $sop->nama         = Input::get('nama');
		        $sop->keterangan   = Input::get('keterangan');
		        $sop->file_laporan = Input::get('file_laporan', $r.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('laporan')->with('success', 'File Laporan baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi Procurement
			elseif (Auth::user()->id==11) {
        	
        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/procurement/laporan/'.$r;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new ProcurementLaporan;

		        // Update data sop yang di ubah
		        $sop->nama         = Input::get('nama');
		        $sop->keterangan   = Input::get('keterangan');
		        $sop->file_laporan = Input::get('file_laporan', $r.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('laporan')->with('success', 'File Laporan baru berhasil ditambahkan.');
	        }
        }
	}

	/**
     * Aksi hapus.
     *
     * @param  int  $idLaporan
     * @return Response
     */
    public function destroyLaporan($idLaporan)
    {
    	// Jika user bertindak sebagai audit
	    if (Auth::user()->id==2) 
	    { 
	    	// Hapus item berdasarkan id
	    	AuditLaporan::find($idLaporan)->delete(); 
	    	// Tampilkan halaman
	    	return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
	    }
		
		// Jika user bertindak sebagai corsek
		elseif (Auth::user()->id==3) 
		{ 
			// Hapus item berdasarkan id
			CorsekLaporan::find($idLaporan)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai finance
		elseif (Auth::user()->id==4) 
		{ 
			// Hapus item berdasarkan id
			FinanceLaporan::find($idLaporan)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai hrds
		elseif (Auth::user()->id==5) 
		{ 
			// Hapus item berdasarkan id
			HrdsLaporan::find($idLaporan)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai it
		elseif (Auth::user()->id==6) 
		{ 
			// Hapus item berdasarkan id
			ItLaporan::find($idLaporan)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai kp
		elseif (Auth::user()->id==7) 
		{ 
			// Hapus item berdasarkan id
			KpLaporan::find($idLaporan)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai logging
		elseif (Auth::user()->id==8) 
		{ 
			// Hapus item berdasarkan id
			LoggingLaporan::find($idLaporan)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai marketing
		elseif (Auth::user()->id==9) 
		{ 
			// Hapus item berdasarkan id
			MarketingLaporan::find($idLaporan)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai plymill
		elseif (Auth::user()->id==10) 
		{ 
			// Hapus item berdasarkan id
			PlymillLaporan::find($idLaporan)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai procurement
		elseif (Auth::user()->id==11) 
		{ 
			// Hapus item berdasarkan id
			ProcurementLaporan::find($idLaporan)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}		
	}
       	
}