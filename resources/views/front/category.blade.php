@extends('layouts.master')

@section('content')
    <h1>Tous les produits par catégory {{$category->name?? 'aucun genre'}}</h1>
    {{ $products->links() }}
    <ul class="list-group">
        @forelse($products as $product)
            <li class="list-group-item">
                <h2><a href="{{ url('product', $product->id) }}">{{ $product->title }}</a></h2>
                <div class="row">
                    @if ($product->picture)
                        <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail">
                                <img width="171" src="{{ asset('images/' . $product->picture->link) }}"
                                     alt="{{ $product->picture->title }}">
                            </a>
                        </div>
                    @endif
                    <div class="col-xs-6 col-md-9">
                        {{ $product->description }}
                    </div>
                </div>

            </li>
        @empty
            <li>Désolé pour l'instant aucun produit n'est encore disponible sur le site</li>
        @endforelse
    </ul>
    {{ $products->links() }}
@endsection
