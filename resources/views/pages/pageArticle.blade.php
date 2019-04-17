@extends('layouts.app')
@section('titre', 'Playgametime - ' . $article->nom)
@section('h1', 'Page de l\'article')
@section('contenu')
    <section id="taches">
        <div class="container os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s">
            <div class="row">
                <div class="col-lg-6">
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
                            title="{{$image_nom}}" class="pageArticle-img"/>
                </div>
                <div class="col-lg-6 text-justify">
                    <h2 >{{$article->nom}}</h2>
                    @if (filled($article->description))
                        <a>{{$article->description}}</a>
                    @endif
                    <hr class="hr-text"/>
                    <h3>Commençant à {{$article->prix}}$ pour {{$article->type->nom}}</h3>
                    </div>
            </div>
        </div>
    </section>
@endsection

