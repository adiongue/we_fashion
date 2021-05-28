@extends('layouts.master')

@section('content')
    @include('back.partial.flash')
    <div class="container">
        <div class="row">
            <form action="{{route('product.store')}}" method="post">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <h1>Créer un produit : </h1>
                    <div class="form">
                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input type="text" name="title" value="{{old('title', "")}}" class="form-control" id="title"
                                   placeholder="Titre du produit" required>
                            @if($errors->has('title')) <span class="error bg-warning text-warning">{{$errors->first('title')}}</span>@endif
                        </div>
                        <div class="form-group">
                            <label for="price">Description :</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                            @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <label for="price">Prix :</label>
                            <input type="number" name="price" value="" class="form-control" id="price"
                                   placeholder="Prix du produit" step=".01" required>
                            @if($errors->has('price')) <span class="error bg-warning text-warning">{{$errors->first('price')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <label for="reference">Reference :</label>
                            <input type="text" name="reference" value="" class="form-control" id="reference"
                                   placeholder="Reference du produit">
                        </div>
                    </div>
                    <div class="form-select">
                        <label for="category">Category :</label>
                        <select id="category" name="category_id">
                            <option value="0" {{ is_null(old('category_id'))? 'selected' : '' }} >Pas de category
                            </option>
                            @foreach($categories as $id => $name)
                                <option {{ old('category_id')==$id? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!-- #end col md 6 -->
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Ajouter un produit</button>
                    <div class="form-select">
                        <label for="size">Taille :</label>
                        <select id="size" name="sizes" required>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        @if($errors->has('sizes')) <span class="error bg-warning text-warning">{{$errors->first('sizes')}}</span> @endif
                    </div>
                    <div class="input-radio">
                        <h2>Status</h2>
                        <input type="radio" @if(old('visible')=='published') checked @endif name="visible" value="published" checked> publier<br>
                        <input type="radio" @if(old('visible')=='unpublished') checked @endif name="visible" value="unpublished" checked> dépublier<br>
                    </div>
                    <div class="input-file">
                        <h2>File :</h2>
                        <input class="file" type="file" name="picture">
                        @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
                    </div>
                </div><!-- #end col md 6 -->
            </form>
        </div>
    </div>
@endsection
