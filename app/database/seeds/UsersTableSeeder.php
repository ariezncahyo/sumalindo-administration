<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $Users = [
            [
                'id'            => '1',
                'username'      => 'admin', 
                'password'      => Hash::make('kokom123'), 
                'email'         => 'admin@slj.com',
                'display_name'  => 'Administrator',
                'access_level'  => '1',
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
			[
                'id'            => '2',
                'username'      => 'audit', 
                'password'      => Hash::make('samarinda'), 
                'email'         => 'audit@slj.com',
                'display_name'  => 'Divisi Audit',
                'access_level'  => '2',
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '3',
                'username'      => 'corsek', 
                'password'      => Hash::make('samarinda'), 
                'email'         => 'corsek@slj.com',
                'display_name'  => 'Divisi Corsek',
                'access_level'  => '3',
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '4',
                'username'      => 'finance', 
                'password'      => Hash::make('samarinda'), 
                'email'         => 'finance@slj.com',
                'display_name'  => 'Divisi Finance',
                'access_level'  => '4',
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '5',
                'username'      => 'hrds', 
                'password'      => Hash::make('samarinda'), 
                'email'         => 'hrds@slj.com',
                'display_name'  => 'Divisi HRDS',
                'access_level'  => '5',
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '6',
                'username'      => 'it', 
                'password'      => Hash::make('samarinda'), 
                'email'         => 'it@slj.com',
                'display_name'  => 'Divisi IT',
                'access_level'  => '6',
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '7',
                'username'      => 'kp', 
                'password'      => Hash::make('samarinda'), 
                'email'         => 'kp@slj.com',
                'display_name'  => 'Divisi KP',
                'access_level'  => '7',
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '8',
                'username'      => 'logging', 
                'password'      => Hash::make('samarinda'), 
                'email'         => 'loging@slj.com',
                'display_name'  => 'Divisi Logging',
                'access_level'  => '8',
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '9',
                'username'      => 'marketing', 
                'password'      => Hash::make('samarinda'), 
                'email'         => 'marketing@slj.com',
                'display_name'  => 'Divisi Marketing',
                'access_level'  => '9',
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '10',
                'username'      => 'plymill', 
                'password'      => Hash::make('samarinda'), 
                'email'         => 'plymill@slj.com',
                'display_name'  => 'Divisi Plymill',
                'access_level'  => '10',
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],
            [
                'id'            => '11',
                'username'      => 'procurement', 
                'password'      => Hash::make('samarinda'), 
                'email'         => 'procurement@slj.com',
                'display_name'  => 'Divisi Procurement',
                'access_level'  => '11',
                'created_at'    => new DateTime, 
                'updated_at'    => new DateTime
            ],

		];
        DB::table('users')->insert($Users);
    }

}