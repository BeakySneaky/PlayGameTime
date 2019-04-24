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
                            @auth
                                <a href="{{ route('produits.edit', [$article->id]) }}">Modifier</a> |
                                <a href="#">Supprimer</a>
                            @endauth
{{--                            TODO : ENLEVER LE ONCLICK--}}
                            <article class="jeu" onclick="redirectToEdit('{{route('produits.show', [$article->id]) }}')">
                                @php ($i += 0.1)
                                {{--                                <a href="{{ route('produits.show', [$article->id]) }}">--}}
                                <img
                                        @if (empty($article->image))
                                        {{$image = asset('medias/categories/'. $article->type->photo)}}
                                        {{$image_nom = $article->type->photo}}
                                        @else
                                        {{$image = asset('medias/produits/'.$article->image) }}
                                        {{$image_nom = $article->image}}

                                        @endif
                                        src="{{$image}}"
                                        alt="{{$image_nom}}"
                                        title="{{$image_nom}}" height="50" width="42"/>
                                <h3>{{ $article->nom }}</h3>
                                <h3>Commençant à {{$article->prix}}$</h3>
                                <p>{{$article->type->nom}}</p>
                                @auth
                                @endauth
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

