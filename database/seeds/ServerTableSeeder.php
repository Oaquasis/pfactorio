<?php

use Illuminate\Database\Seeder;

class ServerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'factorio',
            'dns_name' => 'factorio.brons.pro',
            'ip_address' => '84.26.133.4',
            'status' => 0,
        ]);
    }
}
