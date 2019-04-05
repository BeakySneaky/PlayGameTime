@extends('layouts.app')
@section('titre', 'PlayGameTime.com')
@section('h1', "Magasin")
@section('contenu')
    <section id="taches">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s">Produits</h2>
                </div>
            </div>
            <div class="row">
                @php ($i = 0.5)
                @if (isset($articles))
                    @forelse($articles as $article)
                        <div class="col-lg-4 col-sm-4 col-md-2 os-animation" data-os-animation="fadeIn"
                             data-os-animation-delay="{{$i."s"}}">
                            <article class="jeu">
                                @php ($i += 0.1)
                                <a href="https://www.youtube.com/watch?v=y6120QOlsfU"><img
                                            src="{{ asset('medias/categories/'. $article->type->photo) }}"
                                            alt="{{$article->type->photo}}"
                                            title="{{$article->type->nom}}" height="50" width="42"/></a>
                                <h3>{{ $article->nom }}</h3>
                                <h3>Commençant à {{$article->prix}}$</h3>
                                <p>{{$article->type->nom}}</p>
                            </article>
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <p>Aucun article n'est disponible en ce moment.</p>
                        </div>
                    @endforelse
                @else
                    <div class="col-lg-12">
                        <p>Une erreur est survenue avec la base de donnée.</p>
                    </div>
                @endif
            </div>
        </div>
        @auth
            <a class="btn btn-dark" href="{{route('produits.create')}}">Ajouter un jeu</a>
        @endauth
    </section>

@endsection
