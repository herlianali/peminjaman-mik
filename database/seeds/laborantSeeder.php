<?php

use Illuminate\Database\Seeder;

class laborantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'laborant',
            'role' => 'laborant',
            'username' => 'laborant',
            'password' => md5('laborant'),
        ]);
    }
}
