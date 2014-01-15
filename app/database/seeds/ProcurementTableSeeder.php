<?php

class ProcurementTableSeeder extends Seeder {

    public function run()
    {
        $Sop = [
            [
                'id'            => '1',
                'nama'          => 'Januari 2013', 
                'file_sop'      => 'SOPJAN13.pdf', 
                'keterangan'    => 'SOP Bulan Januari 2013', 
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '2',
                'nama'          => 'Februari 2013', 
                'file_sop'      => 'SOPFEB13.pdf', 
                'keterangan'    => 'SOP Bulan Februari 2013', 
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '3',
                'nama'          => 'Maret 2013', 
                'file_sop'      => 'SOPMAR13.pdf', 
                'keterangan'    => 'SOP Bulan Maret 2013', 
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '4',
                'nama'          => 'April 2013', 
                'file_sop'      => 'SOPAPR13.pdf', 
                'keterangan'    => 'SOP Bulan April 2013', 
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '5',
                'nama'          => 'MEI 2013', 
                'file_sop'      => 'SOPMEI13.pdf', 
                'keterangan'    => 'SOP Bulan Mei 2013', 
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],

		];

        $Laporan = [
            [
                'id'            => '1',
                'nama'          => 'Januari 2013', 
                'file_laporan'  => 'LAPJAN13.pdf', 
                'keterangan'    => 'Laporan Bulan Januari 2013', 
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '2',
                'nama'          => 'Februari 2013', 
                'file_laporan'  => 'LAPFEB13.pdf', 
                'keterangan'    => 'Laporan Bulan Februari 2013', 
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '3',
                'nama'          => 'Maret 2013', 
                'file_laporan'  => 'LAPMAR13.pdf', 
                'keterangan'    => 'Laporan Bulan Maret 2013', 
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '4',
                'nama'          => 'April 2013', 
                'file_laporan'  => 'LAPAPR13.pdf', 
                'keterangan'    => 'Laporan Bulan April 2013', 
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '5',
                'nama'          => 'MEI 2013', 
                'file_laporan'  => 'LAPMEI13.pdf', 
                'keterangan'    => 'Laporan Bulan Mei 2013', 
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],

        ];
         $Struktur = [
            [
                'id'            => '1',
                'keterangan'    => 'Struktur adalah bagaimana bagian-bagian dari sesuatu berhubungan satu dengan lain atau bagaimana sesuatu tersebut disatukan. Struktur adalah sifat fundamental bagi setiap sistem.', 
                'foto'          => 'organization-e.jpg', 
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],

        ];
        
        DB::table('procurement_sop')->insert($Sop);
        DB::table('procurement_laporan')->insert($Laporan);
        DB::table('procurement_struktur')->insert($Struktur);
    }

}