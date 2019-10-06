<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
          'email' => 'test@test.com',
          'name'=>'test',
          'password' => bcrypt("00000000")
      ]
    ]);
    }
}
