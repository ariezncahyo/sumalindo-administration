<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('AuditTableSeeder');
		$this->call('CorsekTableSeeder');
		$this->call('FinanceTableSeeder');
		$this->call('HrdsTableSeeder');
		$this->call('ItTableSeeder');
		$this->call('KpTableSeeder');
		$this->call('LoggingTableSeeder');
		$this->call('MarketingTableSeeder');
		$this->call('PlymillTableSeeder');
		$this->call('ProcurementTableSeeder');
	}

}