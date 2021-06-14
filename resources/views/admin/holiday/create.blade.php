@extends('layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold" style="color: black">Holiday Data</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <form action="{{ route('holiday.store') }}" method="POST">
            @csrf
            <div class="form-group" style="color: black">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" onchange="ubahTanggal()">
            </div>
            <div class="form-group" style="color: black">
                <label for="day">Day</label>
                <input type="text" class="form-control" id="day" name="day" readonly>
            </div>
            <button type="submit" class="btn col-md-12" style="background-color: #C9CACA; font-weight:bolder; color:black">Save</button>
        </form>
    </div>
    @endsection
    @push('javascript')
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script>
        function ubahTanggal() {
            let mydate = document.querySelector("#date").value;
            let weekDayName = moment(mydate).format('dddd');
            document.querySelector('#day').value = weekDayName;
        }
    </script>
    @endpush