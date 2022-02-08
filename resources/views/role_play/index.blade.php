@extends('role_play.role_play_template')
@section('content')
    @if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif
    @isset($rolePlaysMJ[0])
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Jeu de role du MJ</p>
            </header>
            <div class="card-content">
                <div class="content">
                    <table class="table is-hoverable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rolePlaysMJ as $rolePlay)
                                <tr>
                                    <td>{{ $rolePlay->id }}</td>
                                    <td><strong>{{ $rolePlay->name }}</strong></td>
                                    <td><a class="button is-primary" href="{{ route('rolePlays.show', $rolePlay->id) }}">Voir</a></td>
                                    <td><a class="button is-warning" href="{{ route('rolePlays.edit', $rolePlay->id) }}">Modifier</a></td>
                                    <td>
                                        <form action="{{ route('rolePlays.destroy', $rolePlay->id) }}" method="post">
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
                {{ $rolePlaysMJ->links() }}
            </footer>
        </div>
    @endisset
    @isset($rolePlaysPlayer[0])
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Jeu de role que je joue</p>
            </header>
            <div class="card-content">
                <div class="content">
                    <table class="table is-hoverable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rolePlaysPlayer as $rolePlay)
                                <tr>
                                    <td>{{ $rolePlay->id }}</td>
                                    <td><strong>{{ $rolePlay->name }}</strong></td>
                                    <td><a class="button is-primary" href="{{ route('rolePlays.show', $rolePlay->id) }}">Voir</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="card-footer is-centered">
                {{ $rolePlaysPlayer->links() }}
            </footer>
        </div>
    @endisset
@endsection