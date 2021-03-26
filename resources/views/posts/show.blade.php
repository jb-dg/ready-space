@extends('layouts.app')

@section('content')
<!-- Page Content -->
  <div class="container py-4">
    <div class="row">
      <!-- Post Content Column -->
      <div class="col-lg-8">
      	    <div class="card my-4">
                <div class="card-body">
			        <!-- Title -->
			        <h1 class="mt-4">{{ $post->title }}</h1>
			        <!-- Author -->
			        <p class="lead">
                <small>
			        	</small>
			        </p>
              <p class="card-text"></p>
			        <hr>
			        <!-- Preview Image -->
			        <img class="img-fluid rounded img-responsive" src="{{ asset('storage').'/'.$post->image }}" 
			        	width="900" height="300">
			        <hr>
			        <!-- Date/Time -->
              <footer class="blockquote-footer">
                Catégorie : <strong> {{ $post->category ? $post->category->name : 'Uncategorized' }} </strong>   
                |  Localisation : <strong> {{ $post->city }} {{ $post->postal_code }} </strong>   
                <cite title="Source Title"> 
                  <small>
                    - publié le  <strong>{{ $post->created_at->format('d/m/Y à H:m') }}</strong> 
                  </small>
                </cite>
              </footer>
			        <hr>
			        <!-- Post Content -->
			        <p class="lead">{{ $post->caption }}</p>
			        <p> content post</p>
			        <!-- Single Comment -->
			        <div class="media mb-4">
			        </div>
				</div>
			</div>
      </div>
      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
      	<!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Service proposé par</h5>
          <div class="card-body text-left">
          	<a href="{{ route('profiles.show', ['user' => $post->user->username]) }}">
                <img src="{{ $post->user->profile->getImage() }}" class="rounded-circle" width="45px" height="45px">
                <strong>{{ '@'.$post->user->username }}</strong>
             </a>
          </div>
        </div>
     </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
@endsection