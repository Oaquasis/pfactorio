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
            'name' => 'Factorio Basic',
            'dns_name' => 'factorio.brons.pro',
            'ip_address' => '84.26.133.4',
            'port' => 34197,
            'status' => 0
        ]);

        DB::table('servers')->insert([
            'name' => 'Factorio Monster',
            'dns_name' => 'factorio.brons.pro',
            'ip_address' => '84.26.133.4',
            'port' => 33445,
            'status' => 0
        ]);
    }
}
