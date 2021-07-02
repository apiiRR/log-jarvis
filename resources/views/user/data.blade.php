@extends('layouts.app')


@section('content')
@php
$control = App\Models\Control::where('id', 1)->first();
// dd($datas);

// foreach ($datas as $value) {
// dd($value);
// }
@endphp
<div class="page-content py-3">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header text-center">{{ __('Data Absen') }}</div>
                    <div class="card-body">
                        <div class="desc">
                            <p>Project : {{Auth::user()->project->nama}}</p>
                            <p>Employee : {{Auth::user()->name}}</p>
                            @if ($control->kondisi === 1)
                            <a href="" class="btn btn-primary my-2" data-toggle="modal"
                                data-target=".bd-example-modal-lg">Fill Past Absent</a>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Day</th>
                                        <th scope="col">In</th>
                                        <th scope="col">Out</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Activity</th>
                                        <th scope="col">Site</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $key => $value)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$value->date_in}}</td>
                                        <td>{{$value->day_in}}</td>
                                        <td>{{$value->time_in}}</td>
                                        <td>{{$value->time_out}}</td>
                                        <td>{{$value->total_hours}}</td>
                                        <td>{{$value->activity}}</td>
                                        <td>{{$value->site_name}}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{route('data.edit', ['data' => $value->id])}}"
                                                class="btn btn-dark mr-2"><i class="fas fa-edit"></i></a>
                                            {{-- <a href="" class="btn btn-dark" onclick="event.preventDefault();
                                                    document.getElementById('delete').submit();"><i
                                                    class="fas fa-trash"></i></a> --}}
                                            <form id="delete"
                                                action="{{ route('data.destroy', ['data' => $value->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <button type="submit" class="btn btn-danger" value="Delete"> --}}
                                                <button type="submit" class="btn btn-dark mr-2"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="table-responsive">
                            </div>
                        </div>
                        <button type="button" class="btn text-white" data-toggle="modal" data-target="#exampleModal"
                            style="background-color: black">
                            Print Data
                        </button>
                        {{-- <a href="/cpdf/{{Auth::user()->id}}" class="btn text-white"
                        style="background-color: black">Print Data</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//page-content-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Range Time</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <div class="form-group">
                    <label for="bulan">Month</label>
                    <select class="form-control" id="bulan">
                        <option value="">--Choose--</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div> --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="from">Date From</label>
                        <input type="date" class="form-control" id="from">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="to">Date To</label>
                        <input type="date" class="form-control" id="to">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn text-white" style="background-color: black"
                    onclick="this.href='/cpdf/'+ document.getElementById('from').value + '/' + document.getElementById('to').value"
                    target="_blank">Print</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Past Absent Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($datas == null)
            <h1>Data Tidak Ada</h1>
            @else
            <form action="{{route('data.store')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input required type="text" class="form-control" id="nama" value="{{Auth::user()->name}}"
                            readonly>
                        <input required type="text" value="{{Auth::user()->id}}" name="name" readonly hidden>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tanggal">Date In</label>
                            <input required type="date" class="tanggal form-control" id="tanggal_in" name="date_in"
                                onchange="ubahTanggalMasuk()">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hari">Day In</label>
                            <input required type="text" class="form-control" id="hari_in" name="day_in" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="time-in">Time In</label>
                            <input required type="time" class="form-control" id="time-in" name="time_in"
                                onchange="totalJam()">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tanggal">Date Out</label>
                            <input required type="date" class="tanggal form-control" id="tanggal_out" name="date_out"
                                onchange="ubahTanggalSelesai()">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hari">Day Out</label>
                            <input required type="text" class="form-control" id="hari_out" name="day_out" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="time-out">Time Out</label>
                            <input required type="time" class="form-control" id="time_out" name="time_out"
                                onchange="totalJam()">
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