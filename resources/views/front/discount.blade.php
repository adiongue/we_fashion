@extends('layouts.master')

@section('content')
    <h1>Les produits en solde</h1>
    <div>{{$count}} produits trouvés</div>
    {{ $products->links() }}
    <div class="container">
        @forelse($products as $product)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    @if ($product->picture)
                        <div class="view overlay text-center">
                            <img class="product img-fluid" src="{{ asset('images/' . $product->picture->link) }}"
                                 alt="{{ $product->picture->title }}">
                        </div>
                    @endif
                    <div class="card-body text-center">
                        <h5>
                            <strong><a href="{{ url('product', $product->id) }}"
                                       class="dark-grey-text">{{$product->title}}</a></strong>
                        </h5>
                        <h4 class="font-weight-bold blue-text"><strong>{{$product->price}}€</strong></h4>
                    </div>
                </div>
            </div>
        @empty
            <div>Désolé pour l'instant aucun produit n'est encore disponible sur le site</div>
        @endforelse
    </div>
    {{ $products->links() }}
    @include('partial.footer')
@endsection
