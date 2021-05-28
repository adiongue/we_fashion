@extends('layouts.master')

@section('content')
    @include('back.partial.flash')
    <div class="container">
        <div class="row">
            <form action="{{route('product.update', $product->id)}}" method="post">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="col-md-6">
                    <h1>Modifier un produit : </h1>
                    <div class="form">
                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input type="text" name="title" value="{{$product->title}}" class="form-control" id="title"
                                   placeholder="Titre du produit" required>
                            @if($errors->has('title')) <span class="error bg-warning text-warning">{{$errors->first('title')}}</span>@endif
                        </div>
                        <div class="form-group">
                            <label for="price">Description :</label>
                            <textarea type="text" name="description" class="form-control">{{$product->description}}</textarea>
                            @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <label for="price">Prix :</label>
                            <input type="number" name="price" value="{{$product->price}}" class="form-control" id="price"
                                   placeholder="Prix du produit" step=".01" required>
                            @if($errors->has('price')) <span class="error bg-warning text-warning">{{$errors->first('price')}}</span> @endif
                        </div>
                        <div class="form-group">
                            <label for="reference">Reference :</label>
                            <input type="text" name="reference" value="{{$product->reference}}" class="form-control" id="reference"
                                   placeholder="Reference du produit">
                        </div>
                    </div>
                    <div class="form-select">
                        <label for="category">Category :</label>
                        <select id="category" name="category_id">
                            <option value="0" {{ is_null(old('category_id'))? 'selected' : '' }} >Pas de category
                            </option>
                            @foreach($categories as $id => $name)
                                <option {{ (!is_null($product->category) and $product->category->id == $id)? 'selected' : '' }}  value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!-- #end col md 6 -->
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Valider</button>
                    <div class="form-select">
                        <label for="size">Taille :</label>
                        <select id="size" name="sizes" required>
                            @foreach($sizes as $size)
                                <option {{ $size == $product->sizes ? 'selected' : '' }}  value={{$size}}>{{$size}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('sizes')) <span class="error bg-warning text-warnin g">{{$errors->first('sizes')}}</span> @endif
                    </div>
                    <div class="input-radio">
                        <h2>Status</h2>
                        <input type="radio" @if(old('status')=='published') checked @endif name="visible" value="published" {{$product->visible == 'published' ? 'checked' : '' }} > publier<br>
                        <input type="radio" @if(old('status')=='unpublished') checked @endif name="visible" value="unpublished" {{$product->visible == 'unpublished' ? 'checked' : '' }}> dépublier<br>
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
