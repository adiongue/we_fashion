@extends('layouts.master')

@section('content')
    <article class="row">
        <div class="col-md-12">
            @if($product)
                @if($product->picture)
                    <div class="col-xs-6 col-md-12">
                        <a href="#" class="thumbnail">
                            <img class="img-responsive" src="{{asset('images/'.$product->picture->link)}}"
                                 alt="{{$product->picture->title}}">
                        </a>
                    </div>
                @endif
                <div class="col-md-6 mb-4 mb-md-0">
                    <div>
                        <h1>{{$product->title}}</h1>
                    </div>
                    <h5 class="mb-3">
                        <span class="align-middle"> {{$product->price}}€</span>
                    </h5>
                    <p class="text-muted"> {{$product->description}}</p>
                    <div class="form-select">
                        <label for="size">Taille :</label>
                        <select id="size" name="sizes" required>
                            <option value={{$product->sizes}}>{{$product->sizes}}</option>
                        </select>
                    </div>
                </div>
            @else
                <h1>Désolé aucun article</h1>
                @endif
                </li>

        </div>

    </article>
    @include('partial.footer')
@endsection

