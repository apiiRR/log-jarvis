@extends('layouts.user')

@section('content')
{{-- <div class="container">
    <div class="div-box mx-auto">
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
    <a href="{{route('profil.show', ['profil' => Auth::user()->id])}}" class="btn text-white"
        style="background-color: black">Update</a>
</div>
</div>
</div> --}}
<style>
    .form-control {
        border: 0;
    }
</style>
<div class="card border border-1 shadow">
    <div class="card-body">
        <form method="POST" action="{{route('profil.update', ['profil' => $datas->id])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center text-center">
                <div class="col-md-6">
                    @if (!empty($datas->photo))
                    <img src="{{ asset('images/'. $datas->photo ) }}" class="rounded-circle mx-auto d-block"
                        alt="foto profil" style="width: 200px">
                    @else
                    <img src="{{ asset('images/undraw_profile.svg') }}" class="rounded-circle mx-auto d-block" alt=""
                        style="width: 200px">
                    @endif
                    <div class="my-3">
                        <label for="formFile" class="form-label">Ganti Foto ?</label>
                        <input class="form-control border" type="file" id="formFile" name="photo">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control border-bottom" value="{{ $datas->name }}" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control border-bottom" value="{{ $datas->email }}" name="email">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Password</label>
                    <input type="password" class="form-control border-bottom" id="formGroupExampleInput2"
                        placeholder="Password" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Project</label>
                    @foreach ($datas->project as $item)
                    <ul>
                        <li>{{ $item->nama }}</li>
                    </ul>
                    @endforeach
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-sync-alt text-white"></i>
                        Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card border border-1 shadow mt-3" style="margin-bottom: 100px;">
    <div class="card-body">
        <div class="row">
            <div class="d-grid gap-2">
                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection