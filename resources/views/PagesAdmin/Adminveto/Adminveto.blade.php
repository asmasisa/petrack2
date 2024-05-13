<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" crossorigin="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...">

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <title>Gestion veterinaire</title>
</head>
<body>
   

    @extends('layout.appadmin')

    @section('contenu')
    <div id="content-container" class="container">
            <div class="vet-table">
                <h2>Demandes d'inscription des vétérinaires</h2>

                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <table class="vetable" id="vetbl">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Numéro de téléphone</th>
                            <th>Nom du cabinet</th>
                            <th>Heures de travail</th>
                            <th>Frais de consultation</th>
                            <th>Localisation</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vetos as $veto)
                            <tr>
                                <td>{{ $veto->id }}</td>
                                <td>{{ $veto->nomcomplet }}</td>
                                <td>{{ $veto->email }}</td>
                                <td>{{ $veto->numtel }}</td>
                                <td>{{ $veto->nom_cabinet }}</td>
                                <td>{{ $veto->heure_travail }}</td>
                                <td>{{ $veto->frais_consultation }}</td>
                                <td>{{ $veto->localisation }}</td>
                                <td>{{ $veto->description }}</td>
                                <td>
                                    @if($veto->image)
                                        <img src="{{ asset('storage/veterinaires/' . $veto->image) }}" alt="Image du vétérinaire">
                                    @else
                                        Pas d'image
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.vetos.approve', $veto->id) }}" method="POST">
                                        @csrf
                                       
                                        <button type="submit" class="btn btn-success">Approuver</button>
                                    </form>
                                    <form action="{{ route('admin.vetos.reject', $veto->id) }}" method="POST">
                                        @csrf
                                        
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir Supprimer cette inscription ?');">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>