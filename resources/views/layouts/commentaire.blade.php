<section id="commentaires">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s">Ajoutez un commentaire</h2>
        </div>
    </div>
    <div class="container">
        <form method="post" action="{{ route('commentaires.store') }}" >
            {{ csrf_field() }}

            {{--PRÉNOM--}}
            <div class="form-group row ">
                <label for="prenom" class="col-form-label col-sm-2 alignerLabel">Prénom : </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="prenom" id="prenom" maxlength="100" value="{{old('prenom')}}">
                </div>
                <h3 class="col-form-label ttip" title="Ce champ ne peut dépasser plus de 100 caractères.">?</h3>
            </div>
            {{--PRÉNOM--}}
            <div class="form-group row ">
                <label for="nom" class="col-form-label col-sm-2 alignerLabel">Nom : </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nom" id="nom" maxlength="100" value="{{old('nom')}}">
                </div>
                <h3 class="col-form-label ttip" title="Ce champ ne peut dépasser plus de 100 caractères.">?</h3>
            </div>
            {{--COURRIEL--}}
            <div class="form-group row ">
                <label for="courriel" class="col-form-label col-sm-2 alignerLabel">* Courriel : </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="courriel" id="courriel" maxlength="256" required value="{{old('courriel')}}">
                </div>
                <h3 class="col-form-label ttip" title="Ce champ est obligatoire, ne peut dépasser plus de 256 caractères et doit être structuré comme ceci : 'exemple@hotmail.com'.">?</h3>
            </div>
            {{--COMMENTAIRE--}}
            <div class="form-group row">
                <label for="commentaire" class="col-sm-2 alignerLabel">* Commentaire : </label>
                <div class="col-sm-8">
                        <textarea class="form-control" name="commentaire" id="commentaire"
                                  rows="5" maxlength="750" required>{{old('commentaire')}}</textarea>
                </div>
                <h3 class="col-form-label ttip" title="Ce champ est obligatoire et vous ne pouvez pas dépasser plus que 750 caractères.">?</h3>
            </div>

            {{--BOUTON--}}
            <div class="form-group row">
                <div  class="center-block">
                    <input type="submit" class="btn btn-dark" value="Enregistrer">
                </div>
            </div>
        </form>

    </div>
</section>
@section('jscriptValidator')
    <!-- Laravel JavaScript Validation. -->
    {{--Source : https://github.com/proengsoft/laravel-jsvalidation--}}
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\CommentaireRequest') !!}
@endsection