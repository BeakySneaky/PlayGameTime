<?php

namespace App\Http\Controllers;

use App\Commentaire;
use Illuminate\Http\Request;

include_once(app_path() . '/fonctions/debogage.php');


class CommentairesController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $commentaire = new Commentaire($request->all());
            $commentaire->url = url()->previous() == url('/') ? '/' : preg_replace('@' . url('/') . '/@', '', url()->previous());
            if ($commentaire->url == "") {
                $commentaire->url = "/";
            }
            $commentaire->save();
        } catch (\Throwable $e) {
            \Log::error('Erreur inattendue : ', [$e]);
            // il faudra avertir l'usager
        }
        flash('Le commentaire a été enregistré avec succès !')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
