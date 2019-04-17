@extends('layouts.app')
@section('titre', 'Erreur 404')
@section('h1', "Erreur 404")
@section('contenu')
    <section id="taches">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s">Page introuvable - il est possible que la page soit indisponible ou introuvable en ce moment.</h2>

                    <a href="{{ route('pages.accueil') }}">Retourner à l'accueil</a>

                    <p><img src="{{ asset('/medias/error_img/okay-meme-clipart-1.jpg') }}" alt="Error"  title="Error"/>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
