@extends('itemInventory.itemInventory_template')
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
            <p class="card-header-title">Items dans les inventaires</p>
            <div class="select">
                <select onchange="window.location.href = this.value">
                <option value="{{ route('itemInventories.index') }}" @unless($slug1) selected @endunless>Tous les rp</option>
                @foreach($rolePlays as $rolePlay)
                    @if ($slug2 != 0 && $inventories[0]->rolePlay->slug == $slug1)
                        <option value="{{ route('itemInventories.rolePlay.inventory', ['slug1' => $inventories[0]->rolePlay->slug,'slug2' => $slug2]) }}" selected >{{ $inventories[0]->rolePlay->name }}</option>
                    @else
                        <option value="{{ route('itemInventories.rolePlay.inventory', ['slug1' => $rolePlay->slug,'slug2' => 0]) }}" {{ $slug1 == $rolePlay->slug ? 'selected' : '' }}>{{ $rolePlay->name }}</option>
                    @endif
                @endforeach
                </select>
            </div>
            <div class="select">
                <select onchange="window.location.href = this.value">
                    @if (isset($slug1))
                        <option value="{{ route('itemInventories.rolePlay.inventory', ['slug1' => $slug1,'slug2' => 0]) }}" @unless($slug1) selected @endunless>Inventaires du jdr sélectionné</option>
                    @else
                        <option value="{{ route('itemInventories.index') }}" @unless($slug2) selected @endunless>Tous les inventaires</option>
                    @endif
                    @foreach($inventories as $inventory)
                        <option value="{{ route('itemInventories.rolePlay.inventory', ['slug1' => $inventory->rolePlay->slug,'slug2' => $inventory->id]) }}" {{ $slug2 == $inventory->id ? 'selected' : '' }}>{{ $inventory->name }}</option>
                    @endforeach
                </select>
            </div>
            <a class="button is-info" href="{{ route('itemInventories.create') }}?id={{$slug2}}">Créer un item dans un inventaire</a>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom rp</th>
                            <th>Nom inventaire</th>
                            <th>Nom item</th>
                            <th>Catégorie</th>
                            <th>Quantité</th>
                            <th>Durability</th>
                            <th>Prix</th>
                            <th>Poids</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($itemInventories as $itemInventory)
                            <tr>
                                <td>{{ $itemInventory->id }}</td>
                                <td><strong>{{ $itemInventory->inventory->rolePlay->name }}</strong></td>
                                <td><strong>{{ $itemInventory->inventory->name }}</strong></td>
                                <td><strong>{{ $itemInventory->item->name }}</strong></td>
                                <td>{{ $itemInventory->item->category->name }}</td>
                                <td>{{ $itemInventory->quantity }}</td>
                                <td>{{ $itemInventory->durability }}/{{ $itemInventory->item->maxDurability }}</td>
                                <td>{{ $itemInventory->item->priceBase }}</td>
                                <td>{{ $itemInventory->item->weight }}</td>
                                <td>{{ $itemInventory->item->description }}</td>
                                <td><a class="button is-primary" href="{{ route('itemInventories.show', $itemInventory->id) }}">Voir</a></td>
                                <td><a class="button is-warning" href="{{ route('itemInventories.edit', $itemInventory->id) }}">Modifier</a></td>
                                <td>
                                    <form action="{{ route('itemInventories.destroy', $itemInventory->id) }}" method="post">
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
        <footer class="card-footer is-centered">
            {{ $itemInventories->links() }}
        </footer>
    </div>
@endsection