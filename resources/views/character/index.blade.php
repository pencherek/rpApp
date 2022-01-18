@extends('character.character_template')
@section('content')
    @if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Personnages</p>
            <a class="button is-info" href="{{ route('characters.create') }}">Créer un personnage</a>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Rp</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($characters as $character)
                            <tr>
                                <td>{{ $character->id }}</td>
                                <td><strong>{{ $character->name }}</strong></td>
                                <td>{{ $character->rolePlay->name }}</td>
                                <td><a class="button is-primary" href="{{ route('characters.show', $character->id) }}">Voir</a></td>
                                <td><a class="button is-warning" href="{{ route('characters.edit', $character->id) }}">Modifier</a></td>
                                <td>
                                    <form action="{{ route('characters.destroy', $character->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ?');">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer is-centered">
            {{ $characters->links() }}
        </footer>
    </div>
@endsection