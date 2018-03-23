<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PortDataTableSeeder::class);
        $this->call(ShipDataTableSeeder::class);
        $this->call(CabinDataTableSeeder::class);
    }
}
