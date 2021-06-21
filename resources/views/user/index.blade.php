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
                        <input required type="text" class="form-control" id="nama" value="{{Auth::user()->name}}" readonly>
                        <input required type="text" value="{{Auth::user()->id}}" name="name" readonly hidden>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tanggal">Date</label>
                            @if ($datas == null)
                            <input required type="date" class="tanggal form-control" id="tanggal" name="date" readonly>
                            @else
                            <input required type="date" value="{{$datas->date}}" class="tanggal form-control" id="tanggal"
                                name="date" readonly>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="hari">Day</label>
                            <input required type="text" class="form-control" id="hari" name="day" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="time-in">Time In</label>
                            @if ($datas == null)
                            <input required type="time" class="form-control" id="time-in" name="time_in" readonly>
                            @else
                            <input required type="time" value="{{$datas->time_in}}" class="form-control" id="time-in"
                                name="time_in" readonly>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
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
                        <input required type="text" class="form-control" id="activity" name="activity">
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
    function ubahTanggal() {
        let mydate = new Date;
        let dateNow = document.querySelector('#tanggal').value;
        var date = mydate.toJSON().slice(0, 10);
        var nDate = date.slice(0, 4) + '-' +
            date.slice(5, 7) + '-' +
            date.slice(8, 10);
        let weekDayName = moment(dateNow).format('dddd');
        let minutes = mydate.getMinutes();
        minutes = minutes > 9 ? minutes : '0' + minutes;
        let hours = mydate.getHours();
        hours = hours > 9 ? hours : '0' + hours;
        let timeNow = hours + ":" + minutes;
        document.querySelector('#time_out').value = timeNow;
        console.log(timeNow);
        // document.querySelector('#tanggal').value = nDate;
        document.querySelector('#hari').value = weekDayName;
        // console.log(nDate);
    }

    ubahTanggal();

    function totalJam() {
        let jamAwal = document.querySelector("#time-in").value;
        let jamAkhir = document.querySelector("#time_out").value;

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

    totalJam();
</script>
@endpush