@extends('character.character_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Modification d'un personnage</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('characters.update', $character->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="field">
                        <label class="label">Nom</label>
                        <div class="control">
                          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name', $character->name) }}" placeholder="Nom du personnage">
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
                        <div class="content">
                            <table class="table is-hoverable" id="table">
                                <thead>
                                    <tr>
                                        <th>Usernames</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($character->users as $user)
                                        <tr>
                                            <td>
                                                <div class="field">
                                                    <div class="select">
                                                        <select name="user_id[]">
                                                            <option value="" ></option>
                                                            @foreach($character->rolePlay->users as $user2)
                                                                <option value="{{ $user2->id }}" {{ $user2->id  == $user->id ? 'selected' : '' }}>{{ $user2->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('user_id')
                                                            <p class="help is-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a class="button is-danger">Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="field">
                                <div class="control">
                                    <a class="button is-link" id="add">Ajouter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                          <input type="submit" class="button is-link" value="Envoyer"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <a class="button is-primary" href="{{ route('characters.index') }}">Back</a>
    </div>
    <div hidden>
        <table>
            <tr id="row">
                <td>
                    <div class="field">
                        <div class="select">
                            <select name="user_id[]">
                                <option value="" selected></option>
                                @foreach($character->rolePlay->users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id[]')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </td>
                <td>
                    <a class="button is-danger">Supprimer</a>
                </td>
            </tr>
        </table>
    </div>
    @push('head')
        <script src="{{ asset('js/characterTable.js')}}"></script>
    @endpush
@endsection