@extends('layouts.app')
@section('titre', 'Erreur 500')
@section('h1', "Erreur 500")
@section('contenu')
    <section id="taches">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s">Erreur du
                        serveur - une erreur est survenue.</h2>

                    <a href="{{ route('pages.accueil') }}">Retourner à l'accueil</a>

                    <p><img src="{{ asset('/medias/error_img/okay-meme-clipart-1.jpg') }}" alt="Error"  title="Error"/>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

