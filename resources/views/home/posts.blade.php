@extends('layouts.app')
@section('sidebar')
      @include('layouts.sidebar')
@endsection
@section('content')
<div class="container">
<div class="row mt-5">
 @foreach ($user->posts as $post)
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card ">
                <div class="card-body">   
                        <a href="{{ route('profiles.show', ['user' => $post->user->username]) }}">
                            <img src="{{ $post->user->profile->getImage() }}" class="rounded-circle" width="45px" height="45px">
                            <strong>{{ '@'.$post->user->username }}</strong>
                        </a>
                        | <small style="float: right;" class="text-muted">{{ $post->created_at->format('d/m/Y à H:m') }}</small>
                     <hr>
                
                    <h4 class="card-title">
                        <strong>{{ $post->user->username }}</strong>
                    </h4>
                    <p class="card-text">{{ $post->caption }}</p>
                    
                    @can('update', $user->profile)
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Modifier</span>
                        </a>
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Supprimer</span>
                        </button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection