<?php

namespace App\Http\Controllers;



use App\Clientpourexamen;
use App\Statutpourexamen;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuts = Statutpourexamen::orderBy('ordre')->get();
        return View('pages/listeclient', compact('statuts'));
    }

    //EXAMEN 2

    /**
     * CODE ORIGINAL PAR CHRISTIANE LAGACÉ
     * @return string
     */
    public function retrouverClients() : string {
        $valide = true;
        $contenuHTML = '';

        // retrouve l'information passée par AJAX

        $id = $_POST['statut_id'];
        // génère les balises HTML avec la liste des produits
        try {
            $clients = Clientpourexamen::where('statut_id', $id)->orderBy('nomfamille')->get();
            $contenuHTML = View('partials.clients.liste', compact('clients'))->render();
        }
        catch(\Throwable $e) {
            \Log::error("Erreur inattendue. ", [$e]);
            $valide = false;
        }
        return json_encode(compact('valide','contenuHTML'));

    }
}
