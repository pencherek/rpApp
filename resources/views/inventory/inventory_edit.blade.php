@extends('inventory.inventory_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Modification d'un inventaire</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="field">
                        <label class="label">Character</label>
                        <div class="checkbox">
                                @foreach($characters as $character)
                                    <input type="checkbox" name="character_id[]" value="{{ $character->id }}" id="{{ $character->id }}" {{ ($inventory->characters->contains($character)) ? 'checked' : '' }}/><label for="{{ $character->id }}">{{ $character->rolePlay->name.' : '.$character->name }}</label><br/>
                                @endforeach
                        </div>
                        @error('character_id')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Nom</label>
                        <div class="control">
                          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name', $inventory->name) }}" placeholder="Nom de l'inventaire">
                        </div>
                        @error('name')
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