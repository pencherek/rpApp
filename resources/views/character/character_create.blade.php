@extends('character.character_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Création d'un personnage</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('characters.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">Nom</label>
                        <div class="control">
                          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Nom du personnage">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Rp</label>
                        <div class="select">
                            <select name="role_play_id">
                                @foreach(auth()->user()->rolePlaysPlayer as $rolePlay)
                                    <option value="{{ $rolePlay->id }}" {{ $rolePlay->id  == $rolePlay->role_play_id ? 'selected' : '' }}>{{ $rolePlay->name }}</option>
                                @endforeach
                            </select>
                            @error('role_play_id')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                          <button class="button is-link">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <a class="button is-primary" href="{{ route('characters.index') }}">Back</a>
    </div>
@endsection
