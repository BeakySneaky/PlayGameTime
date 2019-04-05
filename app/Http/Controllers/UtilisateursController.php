<?php

namespace App\Http\Controllers;

use App\Http\Requests\UtilisateurRequest;
use App\Utilisateur;
use Illuminate\Http\Request;

class UtilisateursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UtilisateurRequest $request)
    {
        try {
            $utilisateur = new Utilisateur($request->all());
            \Log::debug($request);
            \Log::debug($utilisateur);
            $utilisateur->save();
        }catch (\Throwable $e) {
            \Log::error('Erreur inattendue : ', [$e]);
            flash("Un problème empêche d'ajouter l'usager")->error();
        }
        flash('L\'utilisateur a été créé avec succès !')->success();
        return redirect()->route('pages.accueil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
