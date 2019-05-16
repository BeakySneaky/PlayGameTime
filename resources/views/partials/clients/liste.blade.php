<div class="clients">
    @if ($clients->count() > 0)
        <table class="table">
            <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom de famille</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <th>{{ $client->prenom }}</th>
                    <th>{{ $client->nomfamille }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Il n'y a présentement aucun client pour ce statut.</p>
    @endif
</div>
