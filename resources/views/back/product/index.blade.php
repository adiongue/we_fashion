@extends('layouts.master')

@section('content')
    <p><a href="{{route('product.create')}}"><button type="button" class="btn btn-primary btn-lg">Ajouter un produit</button></a></p>
    {{$products->links()}}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Prix</th>
            <th>Taille</th>
            <th>Etat</th>
            <th>Category</th>
            <th>Status</th>
            <th>Edition</th>
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
                <td>{{$product->state}}</td>
                <td>{{$product->category->name?? 'aucune catégory' }}</td>
                <td>
                    @if($product->visible == 'published')
                        <button type="button" class="btn btn-success">published</button>
                    @else
                        <button type="button" class="btn btn-warning">unpublished</button>
                    @endif
                </td>
                <td>
                    <a href="{{route('product.edit', $product->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                <td>
                <td>
                    <a href="{{route('product.show', $product->id)}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                </td>
                <td>
                    <form class="delete" method="POST" action="{{route('product.destroy', $product->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input class="btn btn-danger" type="submit" value="delete" >
                    </form>
                </td>
            </tr>
        @empty
            aucun produit ...
        @endforelse
        </tbody>
    </table>
    {{$products->links()}}
@endsection
@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection