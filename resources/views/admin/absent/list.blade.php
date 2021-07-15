@extends('layouts.master')

@section('content')
@php
$ui = '';
if (sizeof($datas) == 0) {
$ui = '';
} else {
$ui = $datas[0]->user_id;
}
// dd($datas);
@endphp
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold" style="color: black">Absents Data</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body" style="overflow-x: scroll">
        <div class="mb-3">
            <a href="/list/{{$ui}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                title="Refresh"><i class="fas fa-sync-alt"></i></a>
            <a class="btn btn-warning" data-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                <span data-toggle="tooltip" data-placement="top" title="Filter">
                    <i class="fas fa-filter"></i>
                </span>
            </a>
            <span data-toggle="modal" data-target="#exampleModal">
                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Print">
                    <i class="fas fa-print"></i>
                </button>
            </span>
        </div>
        <div class="collapse mb-3" id="collapseExample">
            <div class="card card-body">
                <form class="form-inline">
                    <div class="form-group mb-2">
                        <label class="mr-2">From</label>
                        <input type="date" class="form-control" id="range_from">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label class="mr-2">To</label>
                        <input type="date" class="form-control" id="range_to">
                    </div>
                    {{-- <button type="submit" class="btn btn-primary mb-2">Filter</button> --}}
                    <a class="btn btn-primary mb-2"
                    onclick="this.href='/list/{{$ui}}/'+ document.getElementById('range_from').value + '/' + document.getElementById('range_to').value">Filter</a>
                </form>
            </div>
        </div>
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
                    <th scope="col">Intensive</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
                @endphp
                @forelse ($datas as $key => $value)
                <tr>
                    <th scope="row">{{++$key}}</th>
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
                    <td>Rp @php echo number_format($value->intensive,2,',','.') @endphp</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{route('absent.edit', ['absent' => $value->id])}}" class="btn btn-dark mr-2"><i
                                class="fas fa-edit"></i></a>
                        <form id="delete" action="{{ route('absent.destroy', ['absent' => $value->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    @php
                    $total += $value->intensive;
                    @endphp
                </tr>
                @empty
                <tr>
                    <td colspan="13">No Data</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="11" class="text-center">Total</td>
                    <td colspan="2" class="text-left">Rp @php echo number_format($total,2,',','.') @endphp
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

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
                    {{-- <div class="form-group"> --}}
                    {{-- <label for="bulan">Month</label> --}}
                    {{-- <select class="form-control" id="bulan">
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
                        </select> --}}
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
                    <input type="text" id="user_id" value="{{$ui}}" readonly hidden>
                    {{-- </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn text-white" style="background-color: black"
                        onclick="this.href='/pdf/'+ document.getElementById('user_id').value + '/' + document.getElementById('from').value + '/' +  document.getElementById('to').value"
                        target="_blank">Print</a>
                </div>
            </div>
        </div>
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

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection