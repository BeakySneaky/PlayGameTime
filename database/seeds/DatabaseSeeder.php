<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  Données initiales

        //  Données de test
        $this->call(TypesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(CommentairesTableSeeder::class);
        $this->call(UtilisateursTableSeeder::class);

    }
}
