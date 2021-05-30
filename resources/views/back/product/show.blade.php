@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1><strong>titre</strong> :{{$product->title}}</h1>
            <h1><strong>prix</strong> :{{$product->price}}</h1>
            <h1><strong>titre</strong> :{{$product->title}}</h1>
            <h1><strong>tailles</strong> :{{$product->sizes}}</h1>
            <h1><strong>Status</strong> :{{$product->visible}}</h1>
            <h1><strong>state</strong> :{{$product->state}}</h1>
            <p><strong>category :</strong>{{$product->genre->name?? 'aucun'}}</p>
            <h1><strong>description</strong> :{{$product->description}}</h1>
            <h1><strong>reference</strong> :{{$product->reference}}</h1>
        </div>
        <div class="col-md-6">
            <h2><strong>Image</strong></h2>
            @if(!empty($product->picture))
                <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="{{asset('images/'.$product->picture->link)}}" alt="{{$product->picture->title}}">
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection 
