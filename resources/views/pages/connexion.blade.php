@extends('layouts.app')
@section('titre', 'Connexion')
@section('h1', "Connexion")
@section('contenu')
    <section id="taches">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s">Entrez les
                    informations
                    pour vous connecter.</h2>
            </div>
        </div>
        <div class="container">
            <form method="post" action="{{ route('connexion.authentification') }}">
                {{ csrf_field() }}
                {{--Nom d'usager--}}
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
                        <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe"
                               maxlength="200" , minlength="10" required>
                    </div>
                    <h3 class="col-form-label ttip"
                        title="Ce champ est obligatoire, doit avoir au moin un symbole spécial et vous ne pouvez pas dépasser plus que 300 caractères.">
                        ?</h3>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <input type="submit" class="btn btn-dark" value="Connexion">
                    </div>
                </div>
            </form>
            <p>Vous n'avez pas de compte ? <a href="{{ route('pages.inscription') }}">Créez-en un ici !</a></p>
        </div>

    </section>
@endsection
@section('jscriptValidator')
    <!-- Laravel JavaScript Validation. -->
    {{--Source : https://github.com/proengsoft/laravel-jsvalidation--}}
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\ConnexionRequest') !!}
@endsection
