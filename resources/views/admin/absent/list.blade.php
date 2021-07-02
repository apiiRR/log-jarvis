@extends('layouts.master')

@section('content')
@php
$ui = '';
if (sizeof($datas) == 0) {
$ui = '';
} else {
$ui = $datas[0]->user_id;
}
// dd($ui);
@endphp
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold" style="color: black">Absents Data</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped text-center" style="color: black">
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
                            {{-- <a href="" class="btn btn-dark" onclick="event.preventDefault();
                                                    document.getElementById('delete').submit();"><i
                                    class="fas fa-trash"></i></a> --}}
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
                        <td colspan="12">No Data</td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="11" class="text-center">Total</td>
                        <td colspan="2" class="text-left">Rp @php echo number_format($total,2,',','.') @endphp</td>
                    </tr>
                </tbody>
                </tbody>
            </table>
            <div class="table-responsive">
            </div>
        </div>
        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"
            style="background-color: #C9CACA; font-weight:bolder; color:black">
            Print Data
        </button>
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
    @endsection