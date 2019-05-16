<?php

use Illuminate\Database\Seeder;

class StatutspourexamenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statutspourexamen')->insert([
            [
                'id' => 1,
                'description' => 'vip',
                'ordre' => 50,
            ],
            [
                'id' => 2,
                'description' => 'bronze',
                'ordre' => 20,
            ],
            [
                'id' => 3,
                'description' => 'argent',
                'ordre' => 30,
            ],
            [
                'id' => 4,
                'description' => 'or',
                'ordre' => 40,
            ],
            [
                'id' => 5,
                'description' => 'régulier',
                'ordre' => 10,
            ],
        ]);
    }
}
