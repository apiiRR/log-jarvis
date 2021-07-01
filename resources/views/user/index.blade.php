@extends('layouts.app')


@section('content')
@php
$tanggalSekarang = date("Y-m-d");
// dd($datas->time_out);
@endphp
<div class="page-content py-3">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="text-white">Jarvis Portal Absent</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    @if ($datas == null)
                    <div class="col-md-6 mb-3">
                        <form action="{{route('data_user.store')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg col-md-12">Time In</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <a href="" class="btn btn-secondary btn-lg col-md-12 disabled" data-toggle="modal"
                            data-target=".bd-example-modal-lg">Time Out</a>
                    </div>
                    @elseif ($datas->time_out != null)
                    <div class="col-md-6 mb-3">
                        <form action="{{route('data_user.store')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-lg col-md-12" disabled>Time In</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <button href="" class="btn btn-secondary btn-lg col-md-12" disabled>Time Out</button>
                    </div>
                    @else
                    <div class="col-md-6 mb-3">
                        <form action="{{route('data_user.store')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-lg col-md-12" disabled>Time In</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <a href="" class="btn btn-primary btn-lg col-md-12" data-toggle="modal"
                            data-target=".bd-example-modal-lg">Time Out</a>
                    </div>
                    @endif
                    <div class="col-md-12">
                        <small id="passwordHelpBlock" class="form-text text-center text-white">
                            Jika anda sudah melakukan absen, abaikan tombol <i>Time_In</i> yang <i>Aktif</i>.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//page-content-->

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Absent Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($datas == null)
            <h1>Data Tidak Ada</h1>
            @else
            <form action="{{route('data_user.update', ['data_user' => $datas->id])}}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input required type="text" class="form-control" id="nama" value="{{Auth::user()->name}}"
                            readonly>
                        <input required type="text" value="{{Auth::user()->id}}" name="name" readonly hidden>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tanggal">Date In</label>
                            @if ($datas == null)
                            <input required type="date" class="tanggal form-control" id="tanggal_in" name="date_in"
                                readonly>
                            @else
                            <input required type="date" value="{{$datas->date_in}}" class="tanggal form-control"
                                id="tanggal_in" name="date_in" readonly>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hari">Day In</label>
                            <input required type="text" class="form-control" id="hari_in" name="day_in" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="time-in">Time In</label>
                            @if ($datas == null)
                            <input required type="time" class="form-control" id="time-in" name="time_in" readonly>
                            @else
                            <input required type="time" value="{{$datas->time_in}}" class="form-control" id="time-in"
                                name="time_in" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tanggal">Date Out</label>
                            <input required type="date" class="tanggal form-control" id="tanggal_out" name="date_out"
                                readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hari">Day Out</label>
                            <input required type="text" class="form-control" id="hari_out" name="day_out" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="time-out">Time Out</label>
                            <input required type="time" class="form-control" id="time_out" name="time_out" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="total">Total Hours</label>
                            <input required type="text" class="form-control" id="total" name="total_hours" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="site">Site Name</label>
                            <input required type="text" class="form-control" id="site" name="site_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activity">Activity</label>
                        <textarea required type="text" class="form-control" id="activity" name="activity"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-primary">Save changes</button> --}}
                    <button type="submit" class="btn text-white" style="background-color: black">Save</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection

@push('javascript')
<script src="https://momentjs.com/downloads/moment.js"></script>
<script>
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
@endpush