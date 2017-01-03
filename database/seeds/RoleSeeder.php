<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->truncate();
      $data = array(
          array('value'=>'0', 'name'=> 'admin'),
          array('value'=>'1', 'name'=> 'user'),
          array('value'=>'2', 'name'=> 'dealer')
      );
      DB::table('roles')->insert($data);
    }
}
