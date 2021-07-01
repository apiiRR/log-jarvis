@extends('layouts.app')


@section('content')
<section class="auth-section login-section text-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header text-center">{{ __('Form Edit') }}</div>
                    <div class="card-body">
                        <form action="{{route('data.update', ['data' => $data->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Name</label>
                                <input required type="text" class="form-control" id="nama"
                                    value="{{Auth::user()->name}}" readonly>
                                <input required type="text" value="{{Auth::user()->id}}" name="name" readonly hidden>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="tanggal">Date In</label>
                                    @if ($data == null)
                                    <input required type="date" class="tanggal form-control" id="tanggal_in"
                                        name="date_in" onchange="ubahTanggalMasuk()">
                                    @else
                                    <input required type="date" value="{{$data->date_in}}" class="tanggal form-control"
                                        id="tanggal_in" name="date_in" onchange="ubahTanggalMasuk()">
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hari">Day In</label>
                                    <input required type="text" value="{{$data->day_in}}" class="form-control"
                                        id="hari_in" name="day_in" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="time-in">Time In</label>
                                    @if ($data == null)
                                    <input required type="time" class="form-control" id="time-in" name="time_in"
                                        onchange="totalJam()">
                                    @else
                                    <input required type="time" value="{{$data->time_in}}" class="form-control"
                                        id="time-in" name="time_in" onchange="totalJam()">
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="tanggal">Date Out</label>
                                    <input required type="date" value="{{$data->date_out}}" class="tanggal form-control"
                                        id="tanggal_out" name="date_out" onchange="ubahTanggalSelesai()">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hari">Day Out</label>
                                    <input required type="text" value="{{$data->day_out}}" class="form-control"
                                        id="hari_out" name="day_out" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="time-out">Time Out</label>
                                    <input required type="time" value="{{$data->time_out}}" class="form-control"
                                        id="time_out" name="time_out" onchange="totalJam()">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="total">Total Hours</label>
                                    <input required type="text" value="{{$data->total_hours}}" class="form-control" id="total" name="total_hours"
                                        readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="site">Site Name</label>
                                    <input required type="text" value="{{$data->site_name}}" class="form-control" id="site" name="site_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="activity">Activity</label>
                                <textarea required type="text" class="form-control" id="activity"
                                    name="activity">{{$data->activity}}</textarea>
                            </div>
                            <button type="submit" class="btn col-md-12 text-white"
                                style="background-color: black">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//container-->
</section>
@endsection

@push('javascript')
<script src="https://momentjs.com/downloads/moment.js"></script>
<script>
    function ubahTanggalMasuk() {
        let mydate = document.querySelector('#tanggal_in').value;
        /* var date = mydate.toJSON().slice(0, 10);
        var nDate = date.slice(0, 4) + '-' +
            date.slice(5, 7) + '-' +
            date.slice(8, 10); */
        let weekDayName = moment(mydate).format('dddd');
        // document.querySelector('#tanggal').value = nDate;
        document.querySelector('#hari_in').value = weekDayName;
        // console.log(nDate);
    }

    function ubahTanggalSelesai() {
        let mydate = document.querySelector('#tanggal_out').value;
        /* var date = mydate.toJSON().slice(0, 10);
        var nDate = date.slice(0, 4) + '-' +
            date.slice(5, 7) + '-' +
            date.slice(8, 10); */
        let weekDayName = moment(mydate).format('dddd');
        // document.querySelector('#tanggal').value = nDate;
        document.querySelector('#hari_out').value = weekDayName;
        // console.log(nDate);
    }

    function totalJam() {
        // let mydate = new Date;
        let dateIn = document.querySelector('#tanggal_in').value;
        let dateOut = document.querySelector('#tanggal_out').value;
        // console.log(dateIn);
        // console.log(dateOut);
        // var date = mydate.toJSON().slice(0, 10);
        // var nDate = date.slice(0, 4) + '-' +
        //     date.slice(5, 7) + '-' +
        //     date.slice(8, 10);
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
</script>
@endpush