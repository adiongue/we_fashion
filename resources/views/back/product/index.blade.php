@extends('layouts.master')

@section('content')
    {{$products->links()}}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Prix</th>
            <th>Taille</th>
            <th>Visible</th>
            <th>Etat</th>
            <th>Category</th>
            <th>Status</th>
            <th>Show</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->price}}€</td>
                <td>{{$product->sizes}}</td>
                <td>{{$product->visible}}</td>
                <td>{{$product->state}}</td>
                <td>{{$product->category->name?? 'aucune catégory' }}</td>
                <td>Status TODO</td>
                <td>
                    <a href="{{route('product.show', $product->id)}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                </td>
                <td>DELETE</td>
            </tr>
        @empty
            aucun produit ...
        @endforelse
        </tbody>
    </table>
    {{$products->links()}}
@endsection 
