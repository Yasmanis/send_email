<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Yasmanis', 'email' => 'yasmabc@gmail.com', 'password' => bcrypt('secret1'), 'hash' => encrypt('secret1')],
            ['name' => 'Lazaro', 'email' => 'lazarosandyl1994@gmail.com', 'password' => bcrypt('secret2'), 'hash' => encrypt('secret2')],
            ['name' => 'Lazaro 2', 'email' => 'lazarosandyl@uclv.cu', 'password' => bcrypt('secret3'), 'hash' => encrypt('secret3')],
        ]);
    }
}
