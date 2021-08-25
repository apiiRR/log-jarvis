@extends('layouts.user')
@section('content')
@php
date_default_timezone_set('Asia/Jakarta');
$hari = date("l");
$tanggal = date("Y-m-d");

$month_num = date("m");
$month_name = date("F", mktime(0, 0, 0, $month_num, 10));
@endphp
<div class="card border border-1 shadow">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col">
                <h6>Selamat Datang</h6>
                <h3 class="fw-bold">{{ Auth::user()->name }}</h3>
            </div>
            <div class="col text-end">
                <small>{{ $hari }}, {{ $tanggal }}</small>
                <small class="d-block" id="waktu">00:00:00</small>
            </div>
        </div>
        <hr>
        <div class="row text-center">
            <div class="col">
                <a href="/" class="btn btn-danger">
                    <i class="fas fa-home text-white"></i>
                </a>
                <span class="small d-block mt-2">Beranda</span>
            </div>
            <div class="col">
                <a href="{{ route('absen.index') }}" class="btn btn-primary">
                    <i class="fas fa-plus-square text-white"></i>
                </a>
                <span class="small d-block mt-2">Absen</span>
            </div>
            <div class="col">
                <a href="{{route('data_user.index')}}" class="btn btn-info">
                    <i class="fas fa-book text-white"></i>
                </a>
                <span class="small d-block mt-2">Riwayat</span>
            </div>
            <div class="col">
                <a href="{{ route('profil.index') }}" class="btn btn-warning">
                    <i class="fas fa-user text-white"></i>
                </a>
                <span class="small d-block mt-2">Akun</span>
            </div>
        </div>
    </div>
</div>

<h4 class="mt-4 fw-bold">Absen Bulan {{ $month_name }}</h4>
<div class="card border border-1 shadow" style="margin-bottom: 100px">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Activitas</th>
                        <th scope="col">Tempat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $item)
                        <tr>
                            <td>{{ $item->date_in }}</td>
                            <td>{{ $item->day_in }}</td>
                            <td>{{ $item->activity }}</td>
                            <td>{{ $item->site_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
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
</script>
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection