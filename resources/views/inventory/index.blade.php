@extends('inventory.inventory_template')
@section('css')
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
        select, .is-info {
            margin: 0.3em;
        }
    </style>
@endsection
@section('content')
    @if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Inventories</p>
            <div class="select">
                <select onchange="window.location.href = this.value">
                    <option value="{{ route('inventories.index') }}" @unless($id) selected @endunless>Tous les characters</option>
                    @foreach(auth()->user()->characters()->oldest('name')->get() as $character)
                        <option value="{{ route('inventories.character', $character->id) }}" {{ $id == $character->id ? 'selected' : '' }}>{{ $character->name }}</option>
                    @endforeach
                </select>
            </div>
            <a class="button is-info" href="{{ route('inventories.create') }}">Créer un inventaire</a>
        </header>
        @foreach($characters as $character)
            <div class="card-content">
                <h2>Inventaires de : {{$character->name}}</h2>
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
                            @foreach($character->inventories as $inventory)
                                <tr>
                                    <td>{{ $inventory->id }}</td>
                                    <td><strong>{{ $inventory->name }}</strong></td>
                                    <td><a class="button is-primary" href="{{ route('inventories.show', $inventory->id) }}">Voir</a></td>
                                    <td><a class="button is-warning" href="{{ route('inventories.edit', $inventory->id) }}">Modifier</a></td>
                                    <td>
                                        <form action="{{ route('inventories.destroy', $inventory->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button is-danger" type="submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection