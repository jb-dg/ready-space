@extends('layouts.app')
@section('sidebar')
      @include('layouts.sidebar')
@endsection
@section('content')

<div class="container">
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Mes annonces</h1>
        <br>
        @include('flash-message')
        <div class="row">
            <div class="col-lg-12">
                @foreach ($user->posts as $post)
                    <!-- Default Card Example -->
                    <div class="card mb-4 ">
                        <div class="card-header">
                            {{ $post->title }} <small>- publié le : {{ $post->created_at->format('d/m/Y à H:m') }}</small>
                        </div>
                        <div class="card-body">
                            <div class="content-card text-left">
                                {{ $post->caption }}
                            </div>
                            <div class="action-card  text-right">
                            @can('update', $user->profile)
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn  btn-secondary btn-icon-split btn-circle">
                                        <span class="icon text-white-100">
                                            <i class="far fa-edit"></i> 
                                        </span>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle">
                                        <span class="icon text-white-100">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        
                                    </button>
                                </form>
                            @endcan
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection