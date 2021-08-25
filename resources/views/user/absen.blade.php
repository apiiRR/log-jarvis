@extends('layouts.user')
@section('content')
@php
date_default_timezone_set('Asia/Jakarta');
$hari = date("l");
$tanggal = date("Y-m-d");

$month_num = date("m");
$month_name = date("F", mktime(0, 0, 0, $month_num, 10));
@endphp
<style>
    .form-select {
        border: 0;
    }

    .form-control {
        border: 0;
    }
</style>
<div class="card border border-1 shadow">
    <div class="card-body">
        <div class="row justify-content-center text-center">
            <h2>{{ $hari }}, {{ $tanggal }}</h2>
            <h5 class="d-block" id="waktu">00:00:00</h5>
        </div>
        <hr>
        <form action="{{route('absen.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nama</label>
                    <input type="text" class="form-control border-bottom" id="formGroupExampleInput"
                        value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="project" class="form-label">Project</label>
                    <select class="form-select border-bottom" id="project" name="project">
                        <option value="">-- Pilih Project --</option>
                        @foreach ($datas as $data)
                        @foreach ($data->project as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
    </div>
</div>
<div class="card border border-1 shadow mt-4" style="margin-bottom: 100px">
    <div class="card-body">
        <div class="d-grid gap-2 col-12 mx-auto">
            @if ($keterangan === null)
            <button class="btn btn-primary" type="submit" style="font-size: 25px;">
                <i class="fas fa-angle-double-right text-white"></i> Absen Masuk
            </button>
            <button class="btn btn-success" type="button" style="font-size: 25px" disabled><i
                    class="fas fa-angle-double-left text-white"></i> Absen Keluar </button>
            <a class="btn btn-danger" style="font-size: 25px" onclick="this.href='/sakit/'+ document.getElementById('project').value"><i class="fas fa-ban text-white"></i>
                Izin Sakit</a>
            @elseif($keterangan->activity !== null)
            <button class="btn btn-primary" type="submit" style="font-size: 25px" disabled>
                <i class="fas fa-angle-double-right text-white"></i> Absen Masuk
            </button>
            <button class="btn btn-success" type="button" style="font-size: 25px" disabled><i
                    class="fas fa-angle-double-left text-white"></i> Absen Keluar</button>
            <button class="btn btn-danger" type="button" style="font-size: 25px" disabled><i
                    class="fas fa-ban text-white"></i>
                Izin Sakit</button>
            @elseif($keterangan->activity === null)
            <button class="btn btn-primary" type="submit" style="font-size: 25px" disabled>
                <i class="fas fa-angle-double-right text-white"></i> Absen Masuk
            </button>
            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                style="font-size: 25px"><i class="fas fa-angle-double-left text-white"></i> Absen Keluar</button>
            <button class="btn btn-danger" type="button" style="font-size: 25px" disabled><i
                    class="fas fa-ban text-white"></i>
                Izin Sakit</button>
            @else
            <button class="btn btn-primary" type="submit" style="font-size: 25px" disabled>
                <i class="fas fa-angle-double-right text-white"></i> Absen Masuk
            </button>
            <button class="btn btn-success" type="button" style="font-size: 25px" disabled><i
                    class="fas fa-angle-double-left text-white"></i> Absen Keluar</button>
            <button class="btn btn-danger" type="button" style="font-size: 25px" disabled><i
                    class="fas fa-ban text-white"></i>
                Izin Sakit</button>
            @endif
        </div>
    </div>
    </form>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Absen Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if ($keterangan !== null)
            <form action="{{route('absen.update', ['absen' => $keterangan->id])}}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nama">Name</label>
                                    <input required type="text" class="form-control border-bottom" id="nama"
                                        value="{{Auth::user()->name}}" readonly>
                                    <input required type="text" value="{{Auth::user()->id}}" name="name" readonly
                                        hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal">Date In</label>
                                    @if ($keterangan == null)
                                    <input required type="date" class="tanggal form-control border-bottom"
                                        id="tanggal_in" name="date_in" readonly>
                                    @else
                                    <input required type="date" value="{{$keterangan->date_in}}"
                                        class="tanggal form-control border-bottom" id="tanggal_in" name="date_in"
                                        readonly>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="hari">Day In</label>
                                    <input required type="text" class="form-control border-bottom" id="hari_in"
                                        name="day_in" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="time-in">Time In</label>
                                    @if ($keterangan == null)
                                    <input required type="time" class="form-control border-bottom" id="time-in"
                                        name="time_in" readonly>
                                    @else
                                    <input required type="time" value="{{$keterangan->time_in}}"
                                        class="form-control border-bottom" id="time-in" name="time_in" readonly>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal">Date Out</label>
                                    <input required type="date" class="tanggal form-control border-bottom"
                                        id="tanggal_out" name="date_out" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="hari">Day Out</label>
                                    <input required type="text" class="form-control border-bottom" id="hari_out"
                                        name="day_out" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="time-out">Time Out</label>
                                    <input required type="time" class="form-control border-bottom" id="time_out"
                                        name="time_out" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="total">Total Hours</label>
                                    <input required type="text" class="form-control border-bottom" id="total"
                                        name="total_hours" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="site">Site Name</label>
                                    <input required type="text" class="form-control border-bottom border-2" id="site"
                                        name="site_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="activity">Activity</label>
                                    <textarea required type="text" class="form-control border border-2" id="activity"
                                        name="activity"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success text-white">Absen Keluar</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>

<script src="https://momentjs.com/downloads/moment.js"></script>
<script>
    setInterval(showTime, 1000);

    function showTime() {
        let time = new Date();
        let hr = time.getHours();
        let min = time.getMinutes();
        let sec = time.getSeconds();
        AMPM = 'AM';

        if (hr > 12) {
            hr -= 12;
            AMPM = "PM";
        }
        if (hr == 0) {
            hr = 12;
            AMPM = "AM";
        }

        hr = hr < 10 ? "0" + hr : hr;
        min = min < 10 ? "0" + min : min;
        sec = sec < 10 ? "0" + sec : sec;

        let curentTime = hr + ":" + min + ":" + sec + " " + AMPM;

        document.getElementById('waktu').innerHTML = curentTime;

    }
    showTime();

    Date.prototype.toJSONLocal = (function () {
        function addZ(n) {
            return (n < 10 ? '0' : '') + n;
        }
        return function () {
            return this.getFullYear() + '-' +
                addZ(this.getMonth() + 1) + '-' +
                addZ(this.getDate());
        };
    }())

    function ubahTanggal() {
        let mydate = new Date;
        // let jakarta = new Date().toLocaleString("en-US", {timeZone: "Asia/Jakarta"});
        // let mydate = new Date(jakarta);
        console.log(mydate);
        // let tanggalJakarta = mydate.toString();
        // console.log(tanggalJakarta)
        let dateNow = document.querySelector('#tanggal_in').value;
        // document.querySelector('#tanggal_out').value = weekDayName;
        let date = mydate.toJSONLocal().slice(0, 10);
        console.log(date);
        let nDate = date.slice(0, 4) + '-' +
            date.slice(5, 7) + '-' +
            date.slice(8, 10);
        console.log(nDate);
        let weekDayName = moment(dateNow).format('dddd');
        let minutes = mydate.getMinutes();
        minutes = minutes > 9 ? minutes : '0' + minutes;
        let hours = mydate.getHours();
        hours = hours > 9 ? hours : '0' + hours;
        let timeNow = hours + ":" + minutes;
        document.querySelector('#time_out').value = timeNow;
        console.log(timeNow);
        document.querySelector('#tanggal_out').value = nDate;
        document.querySelector('#hari_in').value = weekDayName;
        let weekDayNameOut = moment(mydate).format('dddd');
        document.querySelector('#hari_out').value = weekDayNameOut;
    }

    ubahTanggal();

    function totalJam() {
        let mydate = new Date;
        let dateIn = document.querySelector('#tanggal_in').value;
        let dateOut = document.querySelector('#tanggal_out').value;
        console.log(dateIn);
        console.log(dateOut);
        var date = mydate.toJSON().slice(0, 10);
        var nDate = date.slice(0, 4) + '-' +
            date.slice(5, 7) + '-' +
            date.slice(8, 10);
        let jamAwal = document.querySelector("#time-in").value;
        let jamAkhir = document.querySelector("#time_out").value;
        // let tanggal = document.querySelector("#tanggal").value;
        // console.log(nDate == tanggal);
        // console.log(tanggal);

        if (dateIn != dateOut) {
            let batas1 = "23:59";
            let batas2 = "00:00";
            let hours1 = batas1.split(':')[0] - jamAwal.split(':')[0];
            let minutes1 = batas1.split(':')[1] - jamAwal.split(':')[1];

            let hours2 = jamAkhir.split(':')[0] - batas2.split(':')[0];
            let minutes2 = jamAkhir.split(':')[1] - batas2.split(':')[1];

            let totalHours = hours1 + hours2;
            let totalMinutes = minutes1 + minutes2;

            totalMinutes = totalMinutes.toString().length < 2 ? '0' + totalMinutes : totalMinutes;

            if (totalMinutes > 59) {
                totalHours++;
                totalMinutes = totalMinutes - 60;
            }

            totalHours = totalHours.toString().length < 2 ? '0' + totalHours : totalHours;

            document.querySelector('#total').value = totalHours + ':' + totalMinutes;

        } else {

            let hours = jamAkhir.split(':')[0] - jamAwal.split(':')[0];
            let minutes = jamAkhir.split(':')[1] - jamAwal.split(':')[1];

            minutes = minutes.toString().length < 2 ? '0' + minutes : minutes;
            if (minutes < 0) {
                hours--;
                minutes = 60 + minutes;
            }
            hours = hours.toString().length < 2 ? '0' + hours : hours;
            document.querySelector('#total').value = hours + ':' + minutes;
        }
    }

    totalJam();
</script>
@endsection