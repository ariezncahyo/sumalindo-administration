<?php

class ListEmailTableSeeder extends Seeder {

    public function run()
    {
        $list = [
            [
                'id'       => '1',
                'nama'     => 'John Doe', 
                'divis'    => 'IT', 
                'email'    => 'johndoe@sumalindo.com'
            ],
            

		];
        
        DB::table('list_email')->insert($list);
    }

}