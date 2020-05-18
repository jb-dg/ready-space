@extends('layouts.app')
@section('sidebar')
      @include('layouts.sidebar')
@endsection
<link rel="stylesheet" type="text/css" href="{{ asset('css/uploadImage.css') }}">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Créer une annonce') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title" >{{ __('Titre') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="caption" >{{ __('Description') }}</label>
                            <textarea id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption')}}" required autocomplete="caption" autofocus>{{ old('caption')}}</textarea>

                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" required>
                                <option value="">Selectionnez une catégorie</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id === old('category_id') ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @if ($category->children)
                                        @foreach ($category->children as $child)
                                            <option value="{{ $child->id }}" {{ $child->id === old('category_id') ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->name }}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="city">Ville</label>
                              <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group col-md-2">
                              <label for="postal_code">CP</label>
                              <input type="text" value="{{ old('postal_code')}}" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code">
                            </div>
                            @error('postal_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        <hr>
                        <div class="form-group">
                            <label>Choisir une image</label>
                        <div class="image-upload-post mx-auto d-block" id="uploadImage" >
                            <label for="imgInp">
                                <img id="imgMove"  src="/storage/uploadphoto.png" 
                                    class="img-post" style="cursor:pointer; " >
                                    
                                   <div class="overlay" >
                                    <div href="#" class="icon">
                                      <i class="far fa-plus-square"></i>
                                    </div>
                                </div>
                            </label>
                            <input type="file" name="image" id="imgInp" style="cursor: pointer;  display: none"/>
                        <input type="submit" id="Up" style="display: none;" />
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Publier mon annonce') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/uploadImage.js') }}"></script>
@endsection
