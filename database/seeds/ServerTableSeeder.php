<?php

use Illuminate\Database\Seeder;

class ServersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servers')->insert([
            'name' => 'factorio',
            'dns_name' => 'factorio.brons.pro',
            'ip_address' => '84.26.133.4',
            'status' => 0,
            'is_primary' => 1
        ]);
    }
}
