@extends('item.item_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Nom : {{ $item->name }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>Categorie : {{ $category->name }}</p>
                <p>Durabilité max : {{ $item->maxDurability }}</p>
                <p>Prix de base : {{ $item->priceBase }}</p>
                <p>Poids : {{ $item->weight }}</p>
                <p>Description : {{ $item->description }}</p>
            </div>
        </div>
        <a class="button is-primary" href="{{ route('items.index') }}">Back</a>
    </div>
@endsection