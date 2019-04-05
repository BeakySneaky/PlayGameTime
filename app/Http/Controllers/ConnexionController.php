<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ConnexionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authentification(Request $request)
    {
        $nom_usager = $request->nom_usager;
        $mot_de_passe = $request->mot_de_passe;
        $reussi = Auth::attempt(['nom_usager' => $nom_usager, 'password' => $mot_de_passe]);
        if($reussi){
            $retourApresAuthentification = session()->pull('retourApresAuthentification');
            return redirect($retourApresAuthentification);
        }
        else{
            flash("Le nom d'usager ou mot de passe est invalide.")->error();
            return back();
        }
    }

    public function deconnexion()
    {
        Auth::logout();
        return back();
    }

    /**
     * Affiche le formulaire d'authentification.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {

        Session::put('retourApresAuthentification', back()->getTargetUrl());

        return View('pages.accueil');

    }
}
