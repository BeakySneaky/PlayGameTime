<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('types')->insert([

            ['id' => 1,

                'nom' => 'Xbox One',
                'photo' => 'xbox.png',

            ],
            [

                'id' => 2,
                'nom' => 'Playstation 4',
                'photo' => "ps4.png",

            ],
            [

                'id' => 3,
                'nom' => 'Nintendo Switch',
                'photo'=> 'switch.png',

            ]
        ]);
    }
}
