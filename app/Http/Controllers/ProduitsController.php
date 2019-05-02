<?php

namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests\ProduitRequest;
use App\Type;
use Illuminate\Http\RedirectResponse;
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
    public function index(): View
    {
        $articles = Article::orderBy('nom')->get();
        return View('pages/magasin', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $types = Type::orderBy('nom')->get();
        return View('pages/creation', compact('types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitRequest $request)
    {
        $uploadedFile = $request->file('image');
        if ($uploadedFile) {
            $nomFichierOriginal = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $nomFichier = stringToSlug($nomFichierOriginal) . '-' . uniqid();
            $extension = $uploadedFile->extension();
        }
        try {
            // $file sera de type Symfony\Component\HttpFoundation\File\File
            // si on n'a pas besoin de la variable qui représente le fichier après l'avoir déplacé, on peut faire le move sans retenir $file
            if ($uploadedFile) {
                $file = $uploadedFile->move(public_path() . "/medias/produits", $nomFichier . '.' . $extension);
            }
            $article = new Article($request->all());
            if ($uploadedFile) {
                $article->image = $nomFichier . "." . $extension;
            }
            $article->save();
        } catch (\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {

            \Log::error("Erreur lors du téléversement du fichier. ", [$e]);

        } catch (\Throwable $e) {
            \Log::error('Erreur inattendue : ', [$e]);
            // il faudra avertir l'usager
        }
        flash('Le produit a été enregistré avec succès !')->success();
        return redirect()->route('produits.magasin');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article): View
    {
        return View('pages/pageArticle', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return View
     */
    public function edit(Article $article): View
    {
        $types = Type::orderBy('nom')->get();
        return View('pages/modifierArticle', compact('article', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProduitRequest $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(ProduitRequest $request, Article $article): RedirectResponse
    {



        $uploadedFile = $request->file('image');
        if ($uploadedFile) {
            $nomFichierOriginal = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $nomFichier = stringToSlug($nomFichierOriginal) . '-' . uniqid();
            $extension = $uploadedFile->extension();
        }
        else if ($request->effacer){
            \File::Delete('medias/produits/' . $article->image);
            \Log::Debug(public_path() . 'medias/produits/' . $article->image);
        }
        try {
            if ($uploadedFile) {
                $file = $uploadedFile->move(public_path() . "/medias/produits", $nomFichier . '.' . $extension);
            }
            $article->nom = $request->nom;
            $article->description = $request->description;
            $article->prix = $request->prix;
            $article->type_id = $request->type_id;
            if ($uploadedFile) {
                $article->image = $nomFichier . "." . $extension;
            }
            else if ($request->effacer){
                $article->image = null;
            }
            $article->save();
        } catch (\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {

            \Log::error("Erreur lors du téléversement du fichier. ", [$e]);

        } catch (\Throwable $e) {
            \Log::error('Erreur inattendue : ', [$e]);
            // il faudra avertir l'usager
        }
        flash('Le produit a été modifié avec succès !')->success();
        return redirect()->route('produits.magasin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        \File::Delete('medias/produits/' . $article->image);
        $article->delete();
        flash('Le produit a été supprimé avec succès !')->success();
        return redirect()->route('produits.magasin');
    }
}
