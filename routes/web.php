<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/', [
    'as' => 'pages.accueil',
    'uses' => 'PagesController@accueil'
]);
Route::get('/inscription', [
    'as' => 'pages.inscription',
    'uses' => 'PagesController@inscription'
]);
//CONNEXION
Route::get('/connexion',[
    'as' => 'pages.connexion',
    'uses' => 'PagesController@connexion'
])->middleware('guest');

Route::get('/contact', [
    'as' => 'pages.contact',
    'uses' => 'PagesController@contact'
]);
Route::get('/magasin', [
    'as' => 'produits.magasin',
    'uses' => 'ProduitsController@index'
]);

Route::get('magasin/creation', [

    'as' => 'produits.create',

    'uses' => 'ProduitsController@create',

])->middleware('auth');

Route::get('deconnexion', [
    'as' => 'connexion.deconnexion',
    'uses'=> 'ConnexionsController@deconnexion',
])->middleware('auth');

Route::post('produits', [

    'as' => 'produits.store',

    'uses' => 'ProduitsController@store',

]);

Route::post('commentaires', [
    'as' => 'commentaires.store',

    'uses' => 'CommentairesController@store',
]);

Route::post('utilisateurs', [
    'as' => 'utilisateurs.store',
    'uses' => 'UtilisateursController@store',
]);

Route::post('connexion', [
    'as' => 'connexion.authentification',
    'uses' => 'ConnexionsController@authentification',
]);

Auth::routes();

//ACCÉDER À LA PAGE DU PRODUIT
Route::get('magasin/{article}/details', [
    'as' => 'produits.show',
    'uses' => 'ProduitsController@show',
]);

//Modifier le produit
Route::get('magasin/{article}/modification', [
    'as' => 'produits.edit',
    'uses' => 'ProduitsController@edit',
]);
Route::patch('magasin/{article}', [
    'as' => 'produits.update',
    'uses' => 'ProduitsController@update',
]);

//Supprimer l'article
Route::delete('magasin/{article}', [

    'as' => 'produits.destroy',

    'uses' => 'ProduitsController@destroy',

]);
