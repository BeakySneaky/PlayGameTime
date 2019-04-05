@extends('layouts.app')
@section('titre', 'PlayGameTime.com')
@section('h1', "S'inscrire")
@section('contenu')
    <section id="taches">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s">Entrez les informations
                    pour la création de cotre compte.</h2>
            </div>
        </div>
        <div class="container">
            <form method="post" action="{{ route('utilisateurs.store') }}">
                {{ csrf_field() }}
                {{--Prénom--}}
                <div class="form-group row ">
                    <label for="prenom" class="col-form-label col-sm-2 alignerLabel">* Prenom : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="prenom" id="prenom" maxlength="100" required
                               value="{{old('prenom')}}">
                    </div>
                    <h3 class="col-form-label ttip"
                        title="Ce champ est obligatoire et vous ne pouvez pas dépasser plus que 100 caractères.">?</h3>

                </div>
                {{--Nom de famille--}}
                <div class="form-group row ">
                    <label for="nomfamille" class="col-form-label col-sm-2 alignerLabel">* Nom : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nomfamille" id="nomfamille" maxlength="100" required
                               value="{{old('nomfamille')}}">
                    </div>
                    <h3 class="col-form-label ttip"
                        title="Ce champ est obligatoire et vous ne pouvez pas dépasser plus que 100 caractères.">?</h3>

                </div>
                {{--Courriel--}}
                <div class="form-group row ">
                    <label for="courriel" class="col-form-label col-sm-2 alignerLabel">* Courriel : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="courriel" id="courriel" maxlength="256" required
                               value="{{old('courriel')}}">
                    </div>
                    <h3 class="col-form-label ttip"
                        title="Ce champ est obligatoire, ne peut dépasser plus de 256 caractères et doit être structuré comme ceci : 'exemple@hotmail.com'.">
                        ?</h3>
                </div>
                {{--Nom d'utilisateur--}}
                <div class="form-group row ">
                    <label for="nom_usager" class="col-form-label col-sm-2 alignerLabel">* Nom d'utilisateur : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nom_usager" id="nom_usager" maxlength="100"
                               required
                               value="{{old('nom_usager')}}">
                    </div>
                    <h3 class="col-form-label ttip"
                        title="Ce champ est obligatoire et vous ne pouvez pas dépasser plus que 100 caractères.">?</h3>

                </div>
                {{--Mot de passe--}}
                <div class="form-group row ">
                    <label for="mot_de_passe" class="col-form-label col-sm-2 alignerLabel">* Mot de passe : </label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" >
                    </div>
                    <h3 class="col-form-label ttip"
                        title="Ce champ est obligatoire, doit avoir au moin un symbole spécial et vous ne pouvez pas dépasser plus que 300 caractères.">?</h3>
                </div>
                <div class="form-group row ">
                    <label for="mot_de_passe_confirmation" class="col-form-label col-sm-2 alignerLabel">* Confirmation : </label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="mot_de_passe_confirmation" name="mot_de_passe_confirmation" >
                    </div>
                    <h3 class="col-form-label ttip"
                        title="Veuillez confirmer le mot de passe entré.">?</h3>
                </div>

                {{--Soumettre--}}
                <div class="form-group row">
                    <div class="col-lg-12">
                        <input type="submit" class="btn btn-dark" value="S'inscrire">
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
@section('jscriptValidator')
    <!-- Laravel JavaScript Validation. -->
    {{--Source : https://github.com/proengsoft/laravel-jsvalidation--}}
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\UtilisateurRequest') !!}
@endsection
