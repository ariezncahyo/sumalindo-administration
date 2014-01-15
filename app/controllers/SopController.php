<?php

class SopController extends AdminController {

	/**
	 * Menampilkan halaman daftar SOP
	 *
	 * @return View
	 */
	public function getSop($sop = NULL, $divisi = NULL)
	{	
		// Jika Login sebagai divisi Audit
		if (Auth::user()->id==2) {

			// Tampung isi database
			$sop = AuditSop::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/audit/sop/';

			// Tampilkan halaman
			return View::make('backend.auth.sop', compact('sop', 'divisi'));

		}

		// Jika login sebagai divisi corsek
		if (Auth::user()->id==3) {
			
			// Tampung isi database
			$sop = CorsekSop::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/corsek/sop/';

			// Tampilkan halaman
			return View::make('backend.auth.sop', compact('sop', 'divisi'));
		}

		// Jika login sebagai divisi finance
		if (Auth::user()->id==4) {
			
			// Tampung isi database
			$sop = FinanceSop::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/finance/sop/';

			// Tampilkan halaman
			return View::make('backend.auth.sop', compact('sop', 'divisi'));
		}

		// Jika login sebagai divisi HRDS
		if (Auth::user()->id==5) {
			
			// Tampung isi database
			$sop = HrdsSop::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/hrds/sop/';

			// Tampilkan halaman
			return View::make('backend.auth.sop', compact('sop', 'divisi'));
		}

		// Jika login sebagai divisi IT
		if (Auth::user()->id==6) {
			
			// Tampung isi database
			$sop = ItSop::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/it/sop/';

			// Tampilkan halaman
			return View::make('backend.auth.sop', compact('sop', 'divisi'));
		}

		// Jika login sebagai divisi KP
		if (Auth::user()->id==7) {
			
			// Tampung isi database
			$sop = KpSop::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/kp/sop/';

			// Tampilkan halaman
			return View::make('backend.auth.sop', compact('sop', 'divisi'));
		}

		// Jika login sebagai divisi Logging
		if (Auth::user()->id==8) {
			
			// Tampung isi database
			$sop = LoggingSop::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/logging/sop/';

			// Tampilkan halaman
			return View::make('backend.auth.sop', compact('sop', 'divisi'));
		}

		// Jika login sebagai divisi Marketing
		if (Auth::user()->id==9) {
			
			// Tampung isi database
			$sop = MarketingSop::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/marketing/sop/';

			// Tampilkan halaman
			return View::make('backend.auth.sop', compact('sop', 'divisi'));
		}

		// Jika login sebagai divisi plymill
		if (Auth::user()->id==10) {
			
			// Tampung isi database
			$sop = PlymillSop::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/plymill/sop/';

			// Tampilkan halaman
			return View::make('backend.auth.sop', compact('sop', 'divisi'));
		}

		// Jika login sebagai divisi Procurement
		if (Auth::user()->id==11) {
			
			// Tampung isi database
			$sop = ProcurementSop::orderBy('created_at', 'DESC')->get();

			// Tentukan folder file unggahan
			$divisi = '../files/procurement/sop/';

			// Tampilkan halaman
			return View::make('backend.auth.sop', compact('sop', 'divisi'));
		}
	}

	/**
	 *  Input file ke dalam database
	 *
	 * @return View
	 */
	public function postSop()
	{
		// Input semua yang ada ke dalam variabel input
        $input = Input::all();

        // Deklarasikan aturan validasi
        $rules = [
            'nama'   	 => 'required',
            'keterangan' => 'required',
            'file_sop'	 => 'required|mimes:pdf,xls,xlsx,doc,docx'
        ];

        // Pesan error yang akan ditampilkan
        $messages = [
            'nama.required' 	  => 'Nama wajib di isi.',
            'keterangan.required' => 'Keterangan wajib di isi.',
            'file_sop.required'   => 'File belum di pilih.',
            'file_sop.mimes'	  => 'Ekstensi harus :values'
        ];

        // Validasi semua input yang ada berdasarkan rules beserta pesan.
        $v = Validator::make($input, $rules, $messages);

        // Simpan nama file
        $file = Input::file('file_sop');

        // Jika validasi gagal
        if ($v->fails()) {    
        	// kembali ke halaman sebelumnya dengan error validasi...
	        return Redirect::route('sop')->withInput()->withErrors($v);

        } else {

        	// Jika Login sebagai divisi Audit
			if (Auth::user()->id==2) {

				// Nilai Random
				$random = Str::random(20);

        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/audit/sop/'.$random;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new AuditSop;

		        // Update data sop yang di ubah
		        $sop->nama       = Input::get('nama');
		        $sop->keterangan = Input::get('keterangan');
		        $sop->file_sop   = Input::get('file_sop', $random.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('sop')->with('success', 'File SOP baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi Corsek
			elseif (Auth::user()->id==3) {
        	
        		// Nilai Random
				$random = Str::random(20);

        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/corsek/sop/'.$random;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new CorsekSop;

		        // Update data sop yang di ubah
		        $sop->nama       = Input::get('nama');
		        $sop->keterangan = Input::get('keterangan');
		        $sop->file_sop   = Input::get('file_sop', $random.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('sop')->with('success', 'File SOP baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi Finance
			elseif (Auth::user()->id==4) {
        	
        		// Nilai Random
				$random = Str::random(20);

        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/finance/sop/'.$random;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new FinanceSop;

		        // Update data sop yang di ubah
		        $sop->nama       = Input::get('nama');
		        $sop->keterangan = Input::get('keterangan');
		        $sop->file_sop   = Input::get('file_sop', $random.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('sop')->with('success', 'File SOP baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi HRDS
			elseif (Auth::user()->id==5) {
        	
        		// Nilai Random
				$random = Str::random(20);

        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/hrds/sop/'.$random;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new HrdsSop;

		        // Update data sop yang di ubah
		        $sop->nama       = Input::get('nama');
		        $sop->keterangan = Input::get('keterangan');
		        $sop->file_sop   = Input::get('file_sop', $random.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('sop')->with('success', 'File SOP baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi IT
			elseif (Auth::user()->id==6) {
        	
        		// Nilai Random
				$random = Str::random(20);

        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/it/sop/'.$random;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new ItSop;

		        // Update data sop yang di ubah
		        $sop->nama       = Input::get('nama');
		        $sop->keterangan = Input::get('keterangan');
		        $sop->file_sop   = Input::get('file_sop', $random.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('sop')->with('success', 'File SOP baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi KP
			elseif (Auth::user()->id==7) {
        	
        		// Nilai Random
				$random = Str::random(20);

        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/kp/sop/'.$random;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new KpSop;

		        // Update data sop yang di ubah
		        $sop->nama       = Input::get('nama');
		        $sop->keterangan = Input::get('keterangan');
		        $sop->file_sop   = Input::get('file_sop', $random.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('sop')->with('success', 'File SOP baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi Logging
			elseif (Auth::user()->id==8) {
        	
        		// Nilai Random
				$random = Str::random(20);

        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/logging/sop/'.$random;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new LoggingSop;

		        // Update data sop yang di ubah
		        $sop->nama       = Input::get('nama');
		        $sop->keterangan = Input::get('keterangan');
		        $sop->file_sop   = Input::get('file_sop', $random.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('sop')->with('success', 'File SOP baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi Marketing
			elseif (Auth::user()->id==9) {
        	
        		// Nilai Random
				$random = Str::random(20);

        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/marketing/sop/'.$random;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new MarketingSop;

		        // Update data sop yang di ubah
		        $sop->nama       = Input::get('nama');
		        $sop->keterangan = Input::get('keterangan');
		        $sop->file_sop   = Input::get('file_sop', $random.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('sop')->with('success', 'File SOP baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi Plymill
			elseif (Auth::user()->id==10) {
        	
        		// Nilai Random
				$random = Str::random(20);

        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/plymill/sop/'.$random;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new PlymillSop;

		        // Update data sop yang di ubah
		        $sop->nama       = Input::get('nama');
		        $sop->keterangan = Input::get('keterangan');
		        $sop->file_sop   = Input::get('file_sop', $random.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('sop')->with('success', 'File SOP baru berhasil ditambahkan.');
	        }

	        // Jika Login sebagai divisi Procurement
			elseif (Auth::user()->id==11) {
        	
        		// Nilai Random
				$random = Str::random(20);

        		// Tentukan direktori tujuan penyimpanan file
	        	$destinationPath = public_path().'/files/procurement/sop/'.$random;

	        	// Ambil nama asli file
				$filename = $file->getClientOriginalName();

		        // Buat variabel yang menampung data yg dituju
		        $sop = new ProcurementSop;

		        // Update data sop yang di ubah
		        $sop->nama       = Input::get('nama');
		        $sop->keterangan = Input::get('keterangan');
		        $sop->file_sop   = Input::get('file_sop', $random.'/'.$filename);
		        $sop->save();

		        // Simpan file yang akan di upload kedalam server
		        $file->move($destinationPath, $filename);
		        
		        // Kembali ke halaman index sop dengan pesan sukses
		        return Redirect::route('sop')->with('success', 'File SOP baru berhasil ditambahkan.');
	        }
        }
	}

	/**
     * Aksi hapus.
     *
     * @param  int  $idSop
     * @return Response
     */
    public function destroySop($idSop)
    {
    	// Jika user bertindak sebagai audit
	    if (Auth::user()->id==2) 
	    { 
	    	// Hapus item berdasarkan id
	    	AuditSop::find($idSop)->delete(); 
	    	// Tampilkan halaman
	    	return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
	    }
		
		// Jika user bertindak sebagai corsek
		elseif (Auth::user()->id==3) 
		{ 
			// Hapus item berdasarkan id
			CorsekSop::find($idSop)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai finance
		elseif (Auth::user()->id==4) 
		{ 
			// Hapus item berdasarkan id
			FinanceSop::find($idSop)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai hrds
		elseif (Auth::user()->id==5) 
		{ 
			// Hapus item berdasarkan id
			HrdsSop::find($idSop)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai it
		elseif (Auth::user()->id==6) 
		{ 
			// Hapus item berdasarkan id
			ItSop::find($idSop)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai kp
		elseif (Auth::user()->id==7) 
		{ 
			// Hapus item berdasarkan id
			KpSop::find($idSop)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai logging
		elseif (Auth::user()->id==8) 
		{ 
			// Hapus item berdasarkan id
			LoggingSop::find($idSop)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai marketing
		elseif (Auth::user()->id==9) 
		{ 
			// Hapus item berdasarkan id
			MarketingSop::find($idSop)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai plymill
		elseif (Auth::user()->id==10) 
		{ 
			// Hapus item berdasarkan id
			PlymillSop::find($idSop)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}

		// Jika user bertindak sebagai procurement
		elseif (Auth::user()->id==11) 
		{ 
			// Hapus item berdasarkan id
			ProcurementSop::find($idSop)->delete(); 
			// Tampilkan halaman
			return Redirect::back()->with('success', 'File Anda berhasil dihapus.'); 
		}		
	}
       	
}