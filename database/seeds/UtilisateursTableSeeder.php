<?php

use Illuminate\Database\Seeder;

class UtilisateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utilisateurs')->insert([
            ['id'=>1,
                'prenom' => "Peter",
                'nomfamille' => "Enis",
                'courriel' => 'p.enis@hotmail.com',
                'nom_usager' => "petis123",
                'mot_de_passe' =>  bcrypt("bemis123$$$"),
                'administrateur' => 1
            ],
            ['id'=>2,
                'prenom' => "Girard",
                'nomfamille' => "Jambon",
                'courriel' => 'girard420@hotmail.com',
                'nom_usager' => "girardlerare",
                'mot_de_passe' => bcrypt("420blazeit"),
                'administrateur' => 0,
            ]
        ]);
    }
}
