<?php

use Illuminate\Database\Seeder;

class CommentairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commentaires')->insert([

            ['id' => 1,

                'prenom' => 'Toto',
                'nom' => 'Lacasse',
                'courriel' => 'toto@gmail.com',
                'url' => '/',
                'date_du_commentaire' => '2019-02-28 00:00:00',
                'commentaire' => 'Votre site est une vraie mine d\'or.',
            ],
            ['id' => 2,

                'prenom' => 'Annie',
                'nom' => 'Gagnon',
                'courriel' => 'anniegagnon@gmail.com',
                'url' => 'contact',
                'date_du_commentaire' => '2019-03-10 00:00:00',
                'commentaire' => 'Bonjour, j\'aurais besoin de plus d\'informations sur vos produits. Est-ce qu\'un représentant pourrait me contacter ? Merci !',
            ],
            ['id' => 3,

                'prenom' => 'Luc',
                'nom' => 'Courtois',
                'courriel' => 'luc.courtois@hotmail.com',
                'url' => '/',
                'date_du_commentaire' => '2019-03-12 00:00:00',
                'commentaire' => 'Beau site !',
            ],
        ]);
    }
}
