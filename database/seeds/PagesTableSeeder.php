<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            ['id' => 1,
                'url' => "/",
                'title' => "Accueil",
                'h1' => "Play Game Time !",
                'texte' => "<h2 class=\"os-animation\" data-os-animation=\"zoomIn\" data-os-animation-delay=\"0.3s\">Mes tâches</h2>
                   <p>Ce site web fera office de magasin en ligne pour la vente de jeux vidéos / consoles.</p>",
                'description' => "Contient les informations associées à la page d'accueil.",

            ],
            ['id' => 2,
                'url' => "contact",
                'title' => "Contact",
                'h1' => "Contact",
                'texte' => " <h2 class=\"os-animation\" data-os-animation=\"zoomIn\" data-os-animation-delay=\"0.3s\">TODO</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non sapien maximus, lobortis
                        turpis ut, pretium libero. Nullam tincidunt dapibus arcu, non sodales ligula tristique in.
                        Vestibulum gravida feugiat enim, vitae semper nibh convallis vel. Vivamus vel elit nisi. Donec
                        dictum tristique lorem, non laoreet odio feugiat at. Aenean auctor eros justo, sed bibendum
                        velit luctus nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor eu
                        diam sit amet tincidunt. Maecenas venenatis leo eget quam posuere sollicitudin. Nam vitae
                        elementum neque, ut finibus turpis. Donec pellentesque placerat sodales. Sed lobortis risus
                        vitae sapien tincidunt iaculis. Mauris eget pretium ex. Suspendisse potenti.

                        Sed vulputate risus nec risus auctor laoreet. Sed eu metus ipsum. Aliquam eu tellus fringilla,
                        bibendum lectus quis, iaculis nibh. Curabitur a vestibulum justo. Praesent dictum, arcu et
                        pharetra euismod, ex metus interdum sapien, nec blandit elit lectus sed magna. Vivamus dignissim
                        ipsum nec augue mollis tincidunt. Integer interdum vulputate ultrices. Cras et nulla non turpis
                        vulputate condimentum at vel est. Nullam erat erat, ultrices nec ex non, finibus congue purus.
                        Donec nunc enim, fringilla a nisl vel, laoreet venenatis diam.</p>",
                'description' => "Cette page n'est pas complète.",
            ],
        ]);
    }
}

//Format pour les seeds :
//  'id' => ,
//  'url' => "",
//  'title' => "",
//  'h1' => "",
//  'texte' => "",
//  'description' => "",
//
