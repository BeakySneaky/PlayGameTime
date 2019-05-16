@extends('layouts.app')
@section('titre', $page->title)
@section('h1', $page->h1)
@section('contenu')
    <section id="taches">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {!! $page->texte !!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-2 os-animation" data-os-animation="fadeIn"
                     data-os-animation-delay="0.5s">
                    <article class="accueil">
                        <a href="#"><img src="{{ asset('medias/categories/xbox.png') }}" alt="Cours 1"
                                         title="Cours 1"/></a>
                        <h3>Cours 1</h3>
                    </article>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-2 os-animation" data-os-animation="fadeIn"
                     data-os-animation-delay="0.6s">
                    <article class="accueil">
                        <a href="#"><img src="{{ asset('medias/categories/ps4.png') }}" alt="Cours 2"
                                         title="Cours 2"/></a>
                        <h3>Cours 2</h3>
                    </article>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-2 os-animation" data-os-animation="fadeIn"
                     data-os-animation-delay="0.7s">
                    <article class="accueil">
                        <a href="#"><img src="{{ asset('medias/categories/controller3.png') }}" alt="Cours 3"
                                         title="Cours 3"/></a>
                        <h3>Cours 3</h3>
                    </article>
                </div>
            </div>

        </div>
    </section>
    @include('layouts.commentaire')
    <div class="container">
        <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s">Commentaires</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Courriel</th>
                <th scope="col">Commentaire</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($commentaires))
                @foreach($commentaires as $commentaire)
                    @if($commentaire->url == "/")
                        <tr>
                            <th scope="row">{{$commentaire->id}}</th>
                            <td>{{$commentaire->prenom}}</td>
                            <td>{{$commentaire->nom}}</td>
                            <td>{{$commentaire->courriel}}</td>
                            <td>{{$commentaire->commentaire}}</td>
                            <td>{{$commentaire->date_du_commentaire}}</td>
                        </tr>
                    @endif
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection

