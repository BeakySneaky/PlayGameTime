<?php

use Illuminate\Database\Seeder;

class ClientspourexamenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientspourexamen')->insert([
            [
                'id' => 1,
                'nomfamille' => 'Lacasse',
                'prenom' => 'Toto',
                'statut_id' => 1,
            ],
            [
                'id' => 2,
                'nomfamille' => 'Gagnon',
                'prenom' => 'Annie',
                'statut_id' => 4,
            ],
            [
                'id' => 3,
                'nomfamille' => 'Gamache',
                'prenom' => 'Martin',
                'statut_id' => 4,
            ],
            [
                'id' => 4,
                'nomfamille' => 'Cantin',
                'prenom' => 'Kariane',
                'statut_id' => 5,
            ],
            [
                'id' => 5,
                'nomfamille' => 'Courtois',
                'prenom' => 'Yves',
                'statut_id' => 1,
            ],
            [
                'id' => 6,
                'nomfamille' => 'Courtois',
                'prenom' => 'Loïc',
                'statut_id' => 1,
            ],
            [
                'id' => 7,
                'nomfamille' => 'Alie',
                'prenom' => 'Martin',
                'statut_id' => 4,
            ],
            [
                'id' => 8,
                'nomfamille' => 'Hamel',
                'prenom' => 'Jessie',
                'statut_id' => 5,
            ],
            [
                'id' => 9,
                'nomfamille' => 'Beaudoin',
                'prenom' => 'Pierre-Luc',
                'statut_id' => 5,
            ],
            [
                'id' => 10,
                'nomfamille' => 'Cantin',
                'prenom' => 'Julie',
                'statut_id' => 5,
            ],
        ]);
    }
}
