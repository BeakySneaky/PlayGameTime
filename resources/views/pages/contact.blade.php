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
        </div>
    </section>

    @include('layouts.commentaire')

@endsection
