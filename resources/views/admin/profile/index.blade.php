@extends('layouts.master')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="div-box">
        @if (!empty(Auth::user()->photo))
        <div class="User-img">
            <img src="{{asset('images/'.Auth::user()->photo)}}">
        </div>
        @else
        <div class="User-img">
            <img src="{{asset('images/undraw_profile.svg')}}">
        </div>
        @endif
        <h3 class="User-name">Name : {{Auth::user()->name}}</h3>
        <h4 class="designation">Email : {{Auth::user()->email}}</h4>
        <div class="contact-btn">
            <a href="{{route('profile.show', ['profile' => Auth::user()->id])}}" class="btn text-white"
                style="background-color: black;">Update</a>
        </div>
    </div>
</div>
@endsection