@extends('layouts.app')
@section('titre', 'PlayGameTime.com')
@section('h1', "Modification")
@section('contenu')
    <section id="taches">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s">Entrez l'article
                    à ajouter</h2>
            </div>
        </div>
        <div class="container">
            <form method="POST" action="{{ route('produits.update', [$article->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                {{--                NOM DE L'ARTICLE--}}
                <div class="form-group row ">
                    <label for="article" class="col-form-label col-sm-2 alignerLabel">Article : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nom" id="article" maxlength="100" required
                               value="{{$article->nom}}">
                    </div>
                    <h3 class="col-form-label ttip"
                        title="Ce champ est obligatoire et vous ne pouvez pas dépasser plus que 64 caractères.">?</h3>

                </div>
                {{--                DESCRIPTION--}}
                <div class="form-group row">
                    <label for="description" class="col-sm-2 alignerLabel">Description : </label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="description" id="description"
                                  rows="5" maxlength="250">{{$article->description}}</textarea>
                    </div>
                    <h3 class="col-form-label ttip" title="Vous ne pouvez pas dépasser plus que 250 caractères.">?</h3>
                </div>
                {{--                PRIX--}}
                <div class="form-group row">
                    <label for="prix" class="col-form-label col-sm-2 alignerLabel">Prix : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="prix" id="prix" required
                               value="{{$article->prix}}">
                    </div>
                    <h3 class="col-form-label ttip"
                        title="Ce champ est obligatoire et assurez-vous d'entrer un prix adéquat (entre 0.99 et 1000.00.">
                        ?</h3>

                </div>
                {{--                TYPE--}}
                <div class="form-group row">
                    <label for="type" class="col-form-label col-sm-2 alignerLabel">Type : </label>
                    <div class="col-sm-8">
                        <select class="form-control" id="type" name="type_id" required>
                            @if (isset($types))
                                <option value="">Type d'article</option>

                                @foreach($types as $type)
                                    <option value="{{$type->id}}" {{$type->id == $article->type_id ? 'selected' : null }}>{{$type->nom}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <h3 class="col-form-label ttip" title="Assurez-vous de choisir un type de console.">?</h3>
                </div>
                {{--                AJOUT D'IMAGE--}}
                <div class="form-group row">
                    <label for="image" class="col-form-label col-sm-2 alignerLabel">* Image : </label>
                    <div id="appendedInput">


                    </div>

                    @if (filled($article->image))
                        <div id="thisImage" class="thisImage col-lg-8">
                            <img
                                    {{$image = asset('medias/produits/'.$article->image) }}
                                    {{$image_nom = $article->image}}
                                    src="{{$image}}"
                                    alt="{{$image_nom}}"
                                    title="{{$image_nom}}" class="modif-img"/>
                            <div class="thisText">
                                <a>Supprimer</a>
                            </div>
                        </div>

                    @else
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file" name="image" id="image"
                                   value="{{old('image')}}">
                            <input type="hidden" name="effacer" value="effacer"/>
                        </div>
                        <h3 class="col-form-label ttip" title="Ce champ requiert une image de type jpg, gif ou png.">
                            ?</h3>
                    @endif
                </div>


                <div class="form-group row">
                    <div class="col-lg-12">
                        <input type="submit" class="btn btn-dark" value="Enregistrer">
                    </div>
                </div>

            </form>

        </div>
    </section>

@endsection

