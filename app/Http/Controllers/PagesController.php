<?php

namespace App\Http\Controllers;

use App\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PagesController extends Controller
{
    /**
     * Affiche la vue de la page d'accueil.
     *
     */
    public function accueil(): View
    {
        $commentaires = Commentaire::orderBy('date_du_commentaire')->get();
        return View('pages/accueil', compact('commentaires'));
    }

    /**
     * Affiche la vue de la page à venir.
     *
     */
    public function inscription(): View
    {

        return View('pages/inscription');
    }

    public function connexion(): View
    {
        if (back()->getTargetUrl() != route('pages.connexion')) {
            Session::put('retourApresAuthentification', back()->getTargetUrl());
        }
        return View('pages/connexion');
    }

    public function contact(): View
    {
        return View('pages/contact');
    }


    /////////////////////////////////////////////////////

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
