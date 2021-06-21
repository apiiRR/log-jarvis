@extends('layouts.app')


@section('content')
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
                                        <td class="d-flex justify-content-center">
                                            <a href="{{route('data.edit', ['data' => $value->id])}}"
                                                class="btn btn-dark mr-2"><i class="fas fa-edit"></i></a>
                                            <a href="" class="btn btn-dark" onclick="event.preventDefault();
                                                    document.getElementById('delete').submit();"><i
                                                    class="fas fa-trash"></i></a>
                                            <form id="delete"
                                                action="{{ route('data.destroy', ['data' => $value->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                {{--<input type="submit" class="btn btn-danger"
                                                                    value="Delete"> --}}
                                            </form>
                                        </td>
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
                <div class="form-group">
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn text-white" style="background-color: black"
                    onclick="this.href='/cpdf/'+ document.getElementById('bulan').value " target="_blank">Print</a>
            </div>
        </div>
    </div>
</div>
@endsection