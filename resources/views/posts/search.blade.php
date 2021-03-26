@extends('layouts.app')

@section('content')
@include('layouts.banner')
<!-- Page Content -->
<div class="container my-4">
      @if (request()->input('q'))
    <h3 >
        <strong>{{ $posts->total() }} résultat(s) </strong> 
        pour la recherche 
        <strong><i>"{{ request()->q }}"</i></strong>
    </h3>
  @endif

    <div class="row">
        @foreach ($posts as $post)
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card ">
                <div class="card-body">   
                        <a href="{{ route('profiles.show', ['user' => $post->user->username]) }}">
                            <img src="{{ $post->user->profile->getImage() }}" class="rounded-circle" width="45px" height="45px">
                            <strong>{{ '@'.$post->user->username }}</strong>
                        </a>
                        <p class="text-muted"><small style="float: right;" class="text-muted">
                        | {{ $post->created_at->format('d/m/Y à H:m') }}</small></p>
                        <br>
                     <hr>
                
                    <h4 class="card-title">
                        <strong>{{ $post->title }}</strong>
                    </h4>
                    <p class="card-text">{{ $post->category ? $post->category->name : 'Uncategorized' }}</p>
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Voir l'annonce</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /.row -->

    <!-- Pagination -->
    <div class="col-12">
        <div class="row">
            {{ $posts->links() }}
        </div>
    </div>

</div>
<!-- /.container -->
@endsection
