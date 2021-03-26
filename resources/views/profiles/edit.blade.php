@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
@endsection
<link rel="stylesheet" type="text/css" href="{{ asset('css/uploadImage.css') }}">
@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">{{ __('Editer mon profil') }}</div>
        <div class="card-body">
            <form method="POST" id="editProfilForm"  action="{{ route('profiles.update', ['user' => $user->username]) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="image-upload-profile mx-auto d-block" id="uploadImage" >
                            <label for="imgInp">
                                <img id="imgMove" src="{{ $user->profile->getImage() }}" 
                                class="rounded-circle" 
                                 style="width: 150px;height: 150px;cursor:pointer" >
                                   <div class="overlay rounded-circle" >
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
                    <div class="form-group col-md-6">
                            <label for="title" >{{ __('Title') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <br>
                            <label for="link" >{{ __('Link') }}</label>
                            <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') ?? $user->profile->link}}" required autocomplete="link" autofocus>

                            @error('link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group" style="width: 100%;">
                    <label for="description" >{{ __('Description') }}</label>
                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ old('description') ?? $user->profile->description}}</textarea> 

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror   
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Sauvegarde mon profil') }}
                </button>
            </form>
        </div>
    </div> 
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/uploadImage.js') }}"></script>
@endsection

