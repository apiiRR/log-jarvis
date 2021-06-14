@extends('layouts.app')


@section('content')
<div class="page-content py-3">
    <div class="container-fluid">
        <ul class="features-tab nav nav-pills justify-content-center" id="features-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-white" id="feature-tab-1" data-toggle="tab" href="#feature-1" role="tab"
                    aria-controls="feature-1" aria-selected="true"><span>Form Absen</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" id="feature-tab-2" data-toggle="tab" href="#feature-2" role="tab"
                    aria-controls="feature-2" aria-selected="false">Data Absen</a>
            </li>
        </ul>
    </div>

    <div class="container">
        <div class="features-tab-content tab-content" id="features-tab-content">
            <div class="feature-1-pane tab-pane fade show active" id="feature-1" role="tabpanel"
                aria-labelledby="feature-tab-1">
                <section class="auth-section login-section text-center py-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card shadow">
                                    <div class="card-header text-center">{{ __('Form Absen') }}</div>
                                    @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{session('success')}}
                                    </div>
                                    @endif
                                    <div class="card-body">
                                        <form action="{{ route('data.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama">Name</label>
                                                <input type="text" class="form-control" id="nama"
                                                    value="{{Auth::user()->name}}" readonly>
                                                <input type="text" value="{{Auth::user()->id}}" name="name" readonly
                                                    hidden>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="tanggal">Date</label>
                                                    <input type="date" class="tanggal form-control" id="tanggal"
                                                        name="date" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="hari">Day</label>
                                                    <input type="text" class="form-control" id="hari" name="day"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="time-in">Time In</label>
                                                    <input type="time" class="form-control" id="time-in" name="time_in">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="time-out">Time Out</label>
                                                    <input type="time" class="form-control" id="time-out"
                                                        name="time_out" onchange="totalJam()">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="total">Total Hours</label>
                                                    <input type="text" class="form-control" id="total"
                                                        name="total_hours" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="site">Site Name</label>
                                                    <input type="text" class="form-control" id="site" name="site_name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="activity">Activity</label>
                                                <input type="text" class="form-control" id="activity" name="activity">
                                            </div>
                                            <button type="submit" class="btn col-md-12 text-white"
                                                style="background-color: black">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//container-->
                </section>
                <!--//auth-section-->
            </div>
            <div class="feature-2-pane tab-pane fade py-5" id="feature-2" role="tabpanel"
                aria-labelledby="feature-tab-2">
                <section class="auth-section login-section">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-header text-center">{{ __('Data Absen') }}</div>
                                    @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{session('success')}}
                                    </div>
                                    @endif
                                    <div class="card-body">
                                        <div class="desc">
                                            <p>Project : {{Auth::user()->project->nama}}</p>
                                            <p>Employee : {{Auth::user()->name}}</p>
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
                                                        {{-- <th scope="col">Action</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($datas as $key => $value)
                                                    <tr>
                                                        <th scope="row">{{$key + 1}}</th>
                                                        <td>{{$value->date}}</td>
                                                        <td>{{$value->day}}</td>
                                                        <td>{{$value->time_in}}</td>
                                                        <td>{{$value->time_out}}</td>
                                                        <td>{{$value->total_hours}}</td>
                                                        <td>{{$value->activity}}</td>
                                                        <td>{{$value->site_name}}</td>
                                                        {{-- <td class="d-flex justify-content-center">
                                                            <a href="{{route('data.edit', ['data' => $value->id])}}"
                                                                class="btn btn-dark mr-2"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <a href="" class="btn btn-dark" onclick="event.preventDefault();
                                                    document.getElementById('delete').submit();"><i
                                                                    class="fas fa-trash"></i></a>
                                                            <form id="delete"
                                                                action="{{ route('data.destroy', ['data' => $value->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                {{-- <input type="submit" class="btn btn-danger"
                                                                    value="Delete"> --}}
                                                            </form>
                                                        </td> --}}
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="9">No Data</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <div class="table-responsive">
                                            </div>
                                        </div>
                                        <a href="/cpdf/{{Auth::user()->id}}" class="btn text-white"
                                            style="background-color: black">Print Data</a>
                                    </div>
                                </div>
                            </div>
                            <!--//container-->
                </section>
                <!--//auth-section-->
            </div>
            <!--//feature-2-pane-->
        </div>
    </div>
    <!--//container-->
</div>
<!--//page-content-->
@endsection

@push('javascript')
<script src="https://momentjs.com/downloads/moment.js"></script>
<script>
    function ubahTanggal() {
        let mydate = new Date;
        var date = mydate.toJSON().slice(0, 10);
        var nDate = date.slice(0, 4) + '-' +
            date.slice(5, 7) + '-' +
            date.slice(8, 10);
        let weekDayName = moment(mydate).format('dddd');
        document.querySelector('#tanggal').value = nDate;
        document.querySelector('#hari').value = weekDayName;
        // console.log(nDate);
    }

    ubahTanggal();

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