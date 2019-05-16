@extends('layouts.app')
@section('titre', "Liste Des Clients")
@section('h1', "Liste Des Clients" )
@section('contenu')
    <section id="taches">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s">Clients -
                        EXAMEN</h2>
                    {{-- le formulaire utilise la route qui mène à la méthode d'action qui sera appelée par AJAX --}}

                    <form method="post" action="{{ route('clients.retrouverClients') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="statut_id" class="col-form-label col-sm-2">Statuts : </label>
                            <div class="col-sm-4">
                                <select class="form-control" id="statut_id" name="statut_id">
                                    <option value="">Veuillez choisir...</option>
                                    @foreach($statuts as $statut)
                                        <option value="{{ $statut->id }}">{{ $statut->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    <div id="donnees"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
