@extends('item.item_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Modification d'un item</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('items.update', $item->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="field">
                        <label class="label">Category</label>
                        <div class="select">
                            <select name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id  == $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Nom</label>
                        <div class="control">
                          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name', $item->name) }}" placeholder="Nom de l'item">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Durabilité max</label>
                        <div class="control">
                          <input class="input @error('maxDurability') is-danger @enderror" type="number" name="maxDurability" value="{{ old('maxDurability', $item->maxDurability) }}" placeholder="Durabilité max">
                        </div>
                        @error('maxDurability')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Prix de base</label>
                        <div class="control">
                          <input class="input @error('priceBase') is-danger @enderror" type="number" name="priceBase" value="{{ old('priceBase', $item->priceBase) }}" placeholder="Prix de base">
                        </div>
                        @error('priceBase')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Poids</label>
                        <div class="control">
                          <input class="input @error('weight') is-danger @enderror" type="number" name="weight" value="{{ old('weight', $item->weight) }}" placeholder="Poids">
                        </div>
                        @error('weight')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                          <input class="input @error('description') is-danger @enderror" type="text" name="description" value="{{ old('description', $item->description) }}" placeholder="Description">
                        </div>
                        @error('description')
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
        <a class="button is-primary" href="{{ route('items.index') }}">Back</a>
    </div>
@endsection