@extends('layouts.app')
@section('titre', 'Site web indisponible')
@section('h1', "Site web indisponible")
@section('contenu')
    <section id="taches">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s">Le site web est présentement en maintenance, veuillez revenir plus tard ! :)</h2>
                    <p>Message de maintenance : {{ $exception->getMessage() }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
