@extends('role_play.role_play_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Nom : {{ $rolePlay->name }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>Créateur/MJ : {{ $rolePlay->user->name }}</p>
            </div>
        </div>
        @if($rolePlay->user->id == auth()->user()->id)
        <p>vide</p>
        $rolePlay->users->where('id',auth()->user()->id)->get(0)->characters()->where('role_play_id',$rolePlay->id)->get()
        @else
            @foreach ($rolePlay->users->where('id',auth()->user()->id)->get(0)->characters()->where('role_play_id',$rolePlay->id)->get() as $character)
                
            @endforeach
        @endif
        <a class="button is-primary" href="{{ route('rolePlays.index') }}">Back</a>
    </div>
@endsection