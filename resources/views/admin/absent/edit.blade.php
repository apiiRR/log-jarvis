@extends('layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold" style="color: black">Edit Data</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <form action="{{route('absent.update', ['absent' => $data->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" class="form-control" id="nama" value="{{$data->user->name}}" readonly>
                <input type="text" value="{{$data->user_id}}" name="name" readonly hidden>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tanggal">Date</label>
                    <input type="date" class="tanggal form-control" value="{{$data->date}}" id="tanggal" name="date"
                        onchange="ubahTanggal()">
                </div>
                <div class="form-group col-md-6">
                    <label for="hari">Day</label>
                    <input type="text" class="form-control" id="hari" name="day" value="{{$data->day}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="time-in">Time In</label>
                    <input type="time" class="form-control" value="{{$data->time_in}}" id="time-in" name="time_in">
                </div>
                <div class="form-group col-md-6">
                    <label for="time-out">Time Out</label>
                    <input type="time" class="form-control" value="{{$data->time_out}}" id="time-out" name="time_out"
                        onchange="totalJam()">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="total">Total Hours</label>
                    <input type="text" class="form-control" value="{{$data->total_hours}}" id="total" name="total_hours"
                        readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="site">Site Name</label>
                    <input type="text" class="form-control" value="{{$data->site_name}}" id="site" name="site_name">
                </div>
            </div>
            <div class="form-group">
                <label for="activity">Activity</label>
                <input type="text" class="form-control" value="{{$data->activity}}" id="activity" name="activity">
            </div>
            <button type="submit" class="btn col-md-12"  style="background-color: #C9CACA; font-weight:bolder; color:black">Update</button>
        </form>
    </div>
    @endsection

    @push('javascript')
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script>
        function ubahTanggal() {
            let mydate = document.querySelector('#tanggal').value;
            /* var date = mydate.toJSON().slice(0, 10);
            var nDate = date.slice(0, 4) + '-' +
                date.slice(5, 7) + '-' +
                date.slice(8, 10); */
            let weekDayName = moment(mydate).format('dddd');
            // document.querySelector('#tanggal').value = nDate;
            document.querySelector('#hari').value = weekDayName;
            // console.log(nDate);
        }

        // ubahTanggal();

        function totalJam() {
            let jamAwal = document.querySelector("#time-in").value;
            let jamAkhir = document.querySelector("#time-out").value;

            let hours = jamAkhir.split(':')[0] - jamAwal.split(':')[0];
            let minutes = jamAkhir.split(':')[1] - jamAwal.split(':')[1];

            if (jamAwal <= "12:00" && jamAkhir >= "13:00") {
                a = 1;
            } else {
                a = 0;
            }
            minutes = minutes.toString().length < 2 ? '0' + minutes : minutes;
            if (minutes < 0) {
                hours--;
                minutes = 60 + minutes;
            }
            hours = hours.toString().length < 2 ? '0' + hours : hours;
            document.querySelector('#total').value = hours - a + ':' + minutes;
        }
    </script>
    @endpush