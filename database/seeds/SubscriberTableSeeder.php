<?php

use Illuminate\Database\Seeder;

class SubscriberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('subscribers')->insert([
      [
          'email' => 'test1@test.com',
          'subscribed'=>true,
          'deleted_at'=> null
      ],
      [
          'email' => 'test2@test.com',
          'subscribed'=>false,
          'deleted_at'=>null
      ],
      [
          'email' => 'test3@test.com',
          'subscribed'=>true,
          'deleted_at'=>'2019-09-27 22:59:07'
      ]

    ]);
    }
}
