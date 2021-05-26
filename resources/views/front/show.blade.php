
@extends('layouts.master')

@section('content')
    <article class="row">
        <div class="col-md-12">
            @if($product)
                <h1>{{$product->title}}</h1>
                @if($product->picture)
                    <div class="col-xs-6 col-md-12">
                        <a href="#" class="thumbnail">
                            <img src="{{asset('images/'.$product->picture->link)}}" alt="{{$product->picture->title}}">
                        </a>
                    </div>
                @endif
                <h2>Description :</h2>
                {{$product->description}}
            @else
                <h1>Désolé aucun article</h1>
                @endif
                </li>
        </div>
    </article>

    </ul>
@endsection 

