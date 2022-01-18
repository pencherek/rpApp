@extends('item.item_template')
@section('css')
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
        select, .is-info {
            margin: 0.3em;
        }
    </style>
@endsection
@section('content')
    @if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Items</p>
            <div class="select">
                <select onchange="window.location.href = this.value">
                    <option value="{{ route('items.index') }}" @unless($slug) selected @endunless>Tous les items</option>
                    @foreach($categories as $category)
                        <option value="{{ route('items.category', $category->slug) }}" {{ $slug == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <a class="button is-info" href="{{ route('items.create') }}">Créer un item</a>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Max durability</th>
                            <th>Base price</th>
                            <th>Weight</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><strong>{{ $item->name }}</strong></td>
                                <td>{{ $categories->find($item->category_id)->name }}</td>
                                <td>{{ $item->maxDurability }}</td>
                                <td>{{ $item->priceBase }}</td>
                                <td>{{ $item->weight }}</td>
                                <td>{{ $item->description }}</td>
                                <td><a class="button is-primary" href="{{ route('items.show', $item->id) }}">Voir</a></td>
                                <td><a class="button is-warning" href="{{ route('items.edit', $item->id) }}">Modifier</a></td>
                                <td>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="card-footer is-centered">
            {{ $items->links() }}
        </footer>
    </div>
@endsection