@extends('itemInventory.itemInventory_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Création d'un item dans un inventaire</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('itemInventories.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">Inventaire</label>
                        <div class="select">
                            <select name="inventory_id">
                                @foreach($inventories as $inventory)
                                    <option value="{{ $inventory->id }}" {{ $_GET['id'] == $inventory->id ? 'selected' : '' }}>{{ $inventory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Item</label>
                        <div class="select">
                            <select name="item_id">
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->id.' | '.$item->name.' | '.$item->category->name.' | Durabilité : '.$item->maxDurability.' | Prix : '.$item->priceBase.' | Poids : '.$item->weight }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Quantité</label>
                        <div class="control">
                          <input class="input @error('quantity') is-danger @enderror" type="number" name="quantity" value="{{ old('quantity') }}" placeholder="Quantité" min="0"">
                        </div>
                        @error('quantity')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Durabilité</label>
                        <div class="control">
                          <input class="input @error('durability') is-danger @enderror" type="number" name="durability" value="{{ old('durability') }}" placeholder="Durabilité" min="0"">
                        </div>
                        @error('durability')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="control">
                          <button class="button is-link">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <a class="button is-primary" href="{{ url()->previous() }}">Back</a>
    </div>
@endsection
