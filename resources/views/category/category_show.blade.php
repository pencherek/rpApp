@extends('category.category_template')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Nom : {{ $category->name }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>{{ $category->description }}</p>
            </div>
        </div>
        <a class="button is-primary" href="{{ route('categories.index') }}">Back</a>
    </div>
@endsection