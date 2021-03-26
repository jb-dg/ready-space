@extends('layouts.app')

@section('content')
<div class="container">
	@foreach ($posts as $post)
		<div class="row mb-4">
			<div class="col-6 offset-3">
				<a href="{{ route('posts.show', ['post' => $post->id]) }}">
                	<img src="{{ asset('storage') .'/'. $post->image }}" class="w-100">
            	</a>
            	<hr>
            	<div>
            		<div>
            			<a href="{{ route('profiles.show', ['user' => $post->user->username]) }}">
                			<img src="{{ $post->user->profile->getImage() }}" class="rounded-circle" width="25px" height="25px">
                			<strong>{{ '@'.$post->user->username }}</strong>
            			</a>
            			| <i>le {{ $post->created_at->format('d/m/Y à H:m') }}</i>
            		</div> 
            	</div>
			</div>
		</div>
	@endforeach
	<div class="col-12">
		<div class="row">
			{{ $posts->links() }}
		</div>
	</div>
</div>
@endsection