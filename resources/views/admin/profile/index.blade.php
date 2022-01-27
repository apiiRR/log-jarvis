@extends('layouts.master')

@section('content')
{{-- <div class="container d-flex justify-content-center">
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
</div> --}}
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile Information</h1>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{route('profile.update', ['profile' => Auth::user()->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">
                            </div>

                            <div class="form-group">
                                <label>New Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Retype New Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="float: right;">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection