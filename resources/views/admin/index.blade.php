@extends('layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold" style="color: black;">Overall Absence Data</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <table id="example" class="table table-striped text-center w-100" style="color: black">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Project</th>
                    <th scope="col">Date</th>
                    <th scope="col">Day</th>
                    <th scope="col">In</th>
                    <th scope="col">Out</th>
                    <th scope="col">Total</th>
                    <th scope="col">Activity</th>
                    <th scope="col">Site</th>
                    <th scope="col">Remark</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datas as $key => $value)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$value->user->name}}</td>
                    <td>{{$value->user->project->nama}}</td>
                    <td>{{$value->date_in}}</td>
                    <td>{{$value->day_in}}</td>
                    <td>{{$value->time_in}}</td>
                    <td>{{$value->time_out}}</td>
                    <td>{{$value->total_hours}}</td>
                    <td>{{$value->activity}}</td>
                    <td>{{$value->site_name}}</td>
                    <td>{{$value->remark}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="11">No Data</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#example').DataTable({
        responsive: true,
        scrollX: true
    });
</script>
@endsection