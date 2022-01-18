@extends('role_play.role_play_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Modification d'un rp</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('rolePlays.update', $rolePlay->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="field">
                        <label class="label">Créateur/MJ</label>
                        <div class="select">
                            <select name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id  == $rolePlay->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Nom</label>
                        <div class="control">
                          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name', $rolePlay->name) }}" placeholder="Nom du rp">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Slug</label>
                        <div class="control">
                          <input class="input @error('slug') is-danger @enderror" type="text" name="slug" value="{{ old('slug', $rolePlay->slug) }}" placeholder="Slug du rp">
                        </div>
                        @error('slug')
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
        <a class="button is-primary" href="{{ route('rolePlays.index') }}">Back</a>
    </div>
@endsection