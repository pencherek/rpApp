@extends('inventory.inventory_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Nom : {{ $inventory->name }}</p>
            <a class="button is-info" href="{{ route('inventories.itemInventory.create', $inventory->id) }}">Créer un item dans l'inventaire</a>
        </header>
        <div class="card-content">
            <p>Rp : {{$inventory->characters[0]->rolePlay->name}}</p>
            <p>Possédé par : </p>
            <div class="content">
                @foreach($inventory->characters as $character)
                    {{ $character->name }};
                @endforeach
            </div>
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>#</th>
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
                        @foreach($inventory->itemInventories as $itemInventory)
                            <tr>
                                <td>{{ $itemInventory->id }}</td>
                                <td><strong>{{ $itemInventory->item->name }}</strong></td>
                                <td>{{ $itemInventory->item->category->name }}</td>
                                <td>{{ $itemInventory->quantity }}</td>
                                <td>{{ auth()->user()->can('ItemInventory.show.durability.'.$itemInventory->id) ? $itemInventory->durability : '?' }}/{{ $itemInventory->item->maxDurability }}</td>
                                <td>{{ auth()->user()->can('ItemInventory.show.durability.'.$itemInventory->id) ? $itemInventory->item->priceBase : '?' }}</td>
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
        <a class="button is-primary" href="{{ route('inventories.index') }}">Back</a>
    </div>
@endsection