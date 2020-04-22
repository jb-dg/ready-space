 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-4 text-center">
            <img src="{{ asset('media/img-profile-user.jpg') }}" class="rounded-circle" width="170px">
        </div>
        <div class="col-8">
            <div class="d-flex align-items-baseline">
                <div class="h4 mr-3 pt-2">{{ $user->username }}</div>
                <button class="btn btn-sm btn-primary">Follow</button>
            </div>
            <div class="d-flex mt-3">
                <div class="mr-3"><strong>{{ $user->posts->count() }}</strong> Post</div>
                <div class="mr-3"><strong>0</strong> Followers</div>
                <div class="mr-3"><strong>0</strong> Friends</div>
            </div>
            <div class="mt-3">
                <div class="font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><strong>Link: </strong><a href="{{ $user->profile->link }}">{{ $user->profile->link }}</a></div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        @foreach ($user->posts as $post)
        <div class="col-4">
            <img src="{{ asset('storage') .'/'. $post->image }}" class="w-100">
        </div>
        @endforeach
    </div>
</div>
@endsection
