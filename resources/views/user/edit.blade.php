@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
	<div class="container py-4">
		@include('flash-message')
    	<div class="card">
        	<div class="card-header">{{ __('Modifier l\'adresse E-Mail') }}</div>
        	<div class="card-body">
        		<form method="POST" action="{{ route('user.update', ['user' => $user->username]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Changer mon email') }}
                                </button>
                            </div>
                        </div>
                </form>
            </div>
     	</div>
     	<br><br>
     	<div class="card">

        	<div class="card-header">{{ __('Mon mot de passe') }}</div>
        	<div class="card-body">	
               <form method="POST" action="{{ route('user.changepassword', ['user' => $user->username]) }}" enctype="multipart/form-data">
                	@csrf
                        @method('PATCH')
                		<div class="form-group row">
                            <label for="old-password" class="col-md-4 col-form-label text-md-right">{{ __('Ancien mot de passe') }}</label>
                            <div class="col-md-6">
                                <input id="old-password" type="password" class="form-control @error('old-password') is-invalid @enderror" name="old-password" required >
                                @error('old-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new-password" class="col-md-4 col-form-label text-md-right">{{ __('Nouveau mot de passe') }}</label>
                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control @error('new-password') is-invalid @enderror" name="new-password" required >

                                @error('new-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm-password" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le nouveau mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="confirm-password" type="password" class="form-control @error('confirm-password') is-invalid @enderror" name="confirm-password" required >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Changer mon mot de passe') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
 	</div>
@endsection