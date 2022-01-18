@extends('itemInventory.itemInventory_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Inventaire : {{ $itemInventory->inventory->name.' du rp '.$itemInventory->inventory->characters[0]->rolePlay->name }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>Nom : {{ $itemInventory->item->name }}</p>
                <p>Categorie : {{ $itemInventory->item->category->name }}</p>
                <p>Quantité : {{ $itemInventory->quantity }}</p>
                <p>Durabilité : {{ auth()->user()->can('ItemInventory.show.durability.'.$itemInventory->id) ? $itemInventory->durability : '?' }}/{{ $itemInventory->item->maxDurability }}</p>
                <p>Prix de base : {{ auth()->user()->can('ItemInventory.show.durability.'.$itemInventory->id) ? $itemInventory->item->priceBase : '?' }}</p>
                <p>Poids : {{ $itemInventory->item->weight }}</p>
                <p>Description : {{ $itemInventory->item->description }}</p>
            </div>
        </div>
        <a class="button is-primary" href="{{ url()->previous() }}">Back</a>
    </div>
@endsection