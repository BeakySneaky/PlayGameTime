<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([

            ['id' => 1,

                'nom' => 'Metro Exodus',
                'description' => 'Pew Pew survive in the metro',
                'prix' => '79.99',
                'type_id' => 1

            ],
            [

                'id' => 2,

                'nom' => 'Call of Duty: Black Ops 4',
                'description' => 'Pew Pew survive in the future',
                'prix' => '79.99',
                'type_id' => 3

            ],
            [

                'id' => 3,

                'nom' => 'Far Cry 5  ',
                'description' => 'Pew Pew survive in montana',
                'prix' => '79.99',
                'type_id' => 2

            ]
        ]);

    }
}
