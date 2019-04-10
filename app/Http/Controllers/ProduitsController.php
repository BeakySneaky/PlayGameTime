<?php

namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests\ProduitRequest;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\View\View;
include_once(app_path() . '/fonctions/debogage.php');
include_once(app_path() . '/fonctions/stringToSlug.php');


class ProduitsController extends Controller
{

//    /**
//     * Affiche la vue de la page du magasin.
//     *
//     */
//    public function magasin() : View
//    {
//        return View('pages/magasin');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        $articles = Article::orderBy('nom')->get();
        return View('pages/magasin',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        $types = Type::orderBy('nom')->get();
        return View('pages/creation', compact('types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitRequest $request)
    {
        $uploadedFile = $request->file('image');   // 'photo' est l'attribut name du <input type="file">
        $nomFichierOriginal = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $nomFichier = stringToSlug($nomFichierOriginal) . '-' . uniqid();
        $extension = $uploadedFile->extension();

        try {
            // $file sera de type Symfony\Component\HttpFoundation\File\File
            // si on n'a pas besoin de la variable qui représente le fichier après l'avoir déplacé, on peut faire le move sans retenir $file
            $file = $uploadedFile->move(public_path() . "/medias/produits", $nomFichier . '.' . $extension);

            $article = new Article($request->all());
            $article->image = $nomFichier . "." . $extension;
            $article->save();
        }
        catch(\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {

            \Log::error("Erreur lors du téléversement du fichier. ", [$e]);

        }
        catch (\Throwable $e) {
                \Log::error('Erreur inattendue : ', [$e]);
                // il faudra avertir l'usager
            }
        flash('Le produit a été enregistré avec succès !')->success();
        return redirect()->route('produits.magasin');
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
