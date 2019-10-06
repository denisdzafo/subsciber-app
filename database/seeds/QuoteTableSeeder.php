<?php

use Illuminate\Database\Seeder;

class QuoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i=0; $i<20; $i++)
      {
        DB::table('quotes')->insert([
          [
              'quote' => 'Lorem ipsum dolor sit amet, pri ut nullam consectetuer, id sit illud tollit. Ea sit odio suavitate, ne has ignota tibique consequat.'
          ]
        ]);
      }
    }
}
