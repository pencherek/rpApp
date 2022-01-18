@extends('character.character_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Nom : {{ $character->name }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>MJ : {{ $character->rolePlay->user->name }}</p>
                <p>Rp : {{$character->rolePlay->name}}</p>
                <p>Stats : {{$character->stats}}</p>
            </div>
        </div>
        
        <a class="button is-primary" href="{{ route('characters.index') }}">Back</a>
    </div>
@endsection