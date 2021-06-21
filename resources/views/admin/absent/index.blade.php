@extends('layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold" style="color: black">Absents Data</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        {{-- <form action="/list" method="POST">
            @csrf
            <label for="nama" class="text-left">{{ __('Choose Name') }}</label>
        <select id="nama" class="form-control" name="nama">
            <option>--Choose Option--</option>
            @foreach ($names as $name)
            <option value="{{ $name->id }}">
                {{ $name->name }}
            </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary mt-3">Show</button>
        </form> --}}
        <div class="dropdown">
            <div class="row">
                <button class="btn dropdown-toggle col-md-12"
                    style="background-color: #C9CACA; font-weight:bolder; color:black" type="button"
                    id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    Choose Name
                </button>
                <ul class="dropdown-menu dropdown-menu-dark w-100" aria-labelledby="dropdownMenuButton2">
                    @foreach ($names as $name)
                    <li><a class="dropdown-item bg-white" href="/list/{{$name->id }}"
                            style="font-weight: 900;">{{ $name->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endsection