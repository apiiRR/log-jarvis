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

                <form>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>New Password</label>
                                <input type="text" name="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Retype New Password</label>
                                <input type="text" name="" class="form-control">
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div>

                                <div class="form-group">
                                    <div>
                                        <img src="https://static.thenounproject.com/png/643663-200.png">
                                    </div>
                                    <input type="file" name="" class="form-control" style="border:0;">
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label>Project</label>
                                    <input type="text" name="" class="form-control">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="float: right;">
                                <button class="btn btn-info">Cancel</button>
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection