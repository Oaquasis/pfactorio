<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'willemAPI',
                'email' => 'games@brons.pro',
                'password' => bcrypt('Willem@Api#2611')],
            [
                'name' => 'oaquasis',
                'email' => 'willem@brons.pro',
                'password' => bcrypt('Secret01')]
        ]);
    }
}
