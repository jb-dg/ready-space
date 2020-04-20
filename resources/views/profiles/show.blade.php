@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-4 text-center">
            <img src="{{ asset('media/img-profile-user.jpg') }}" class="rounded-circle" width="170px">
        </div>
        <div class="col-8">
            <div class="d-flex">
                <div class="h4 mr-3 pt-2">jb-dg</div>
                <button class="btn btn-sm btn-primary">Follow</button>
            </div>
            <div class="d-flex mt-3">
                <div class="mr-3"><strong>0</strong> Post</div>
                <div class="mr-3"><strong>0</strong> Followers</div>
                <div class="mr-3"><strong>0</strong> Friends</div>
            </div>
            <div class="mt-3">
                <div>Ready Space with Framework Laravel</div>
                <div>Ce n'est que le début !</div>
                <div><strong>GitHub: </strong><a href="https://github.com/jb-dg">@jb-dg</a></div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <img src="{{ asset('media/img-1.jpg') }}" class="w-100">
        </div>
        <div class="col-4">
            <img src="{{ asset('media/img-2.jpg') }}" class="w-100">
        </div>
        <div class="col-4">
            <img src="{{ asset('media/img-3.jpg') }}" class="w-100">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <img src="{{ asset('media/img-4.jpg') }}" class="w-100">
        </div>
        <div class="col-4">
            <img src="{{ asset('media/img-5.jpg') }}" class="w-100">
        </div>
        <div class="col-4">
            <img src="{{ asset('media/img-6.jpg') }}" class="w-100">
        </div>
    </div>
</div>
@endsection
