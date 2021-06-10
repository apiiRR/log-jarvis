@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <div class="div-box mx-auto">
        <div class="User-img">
            <img src="{{asset('admin/img/undraw_profile.svg')}}">
        </div>
        <h3 class="User-name">Name : {{Auth::user()->name}}</h3>
        <h4 class="designation">Email : {{Auth::user()->email}}</h4>
        <div class="contact-btn">
            <a href="{{route('profile.show', ['profile' => Auth::user()->id])}}" class="btn text-white" style="background-color: black">Update</a>
        </div>
    </div>
</div>
@endsection