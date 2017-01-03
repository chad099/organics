<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->truncate();
      DB::table('users')->insert([
          'name' => 'admin',
          'email' => 'admin@organics.com',
          'role'=>0,
          'password' => bcrypt('123456'),
      ]);
    }
}
