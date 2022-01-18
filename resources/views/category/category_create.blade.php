@extends('category.category_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Création d'une catégorie</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">Nom</label>
                        <div class="control">
                          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Nom de la catégorie">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Slug</label>
                        <div class="control">
                          <input class="input @error('slug') is-danger @enderror" type="text" name="slug" value="{{ old('slug') }}" placeholder="Slug de la catégorie">
                        </div>
                        @error('slug')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                          <input class="input @error('description') is-danger @enderror" type="text" name="description" value="{{ old('description') }}" placeholder="Description de la catégorie">
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
        <a class="button is-primary" href="{{ route('categories.index') }}">Back</a>
    </div>
@endsection
