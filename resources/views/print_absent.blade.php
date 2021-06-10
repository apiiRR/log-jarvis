<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Time Sheet Engineer</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">

                        <div class="row pb-5 p-5">
                            <div class="col-md-6">
                                {{-- <p class="font-weight-bold mb-4">Client Information</p> --}}
                                <p class="mb-1">Project : {{$datas->project->nama}}</p>
                                <p>Employee : {{$datas->user->name}}</p>
                                {{-- <p class="mb-1">Berlin, Germany</p> --}}
                                {{-- <p class="mb-1">6781 45P</p> --}}
                            </div>

                            {{-- <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-4">Payment Details</p>
                                <p class="mb-1"><span class="text-muted">VAT: </span> 1425782</p>
                                <p class="mb-1"><span class="text-muted">VAT ID: </span> 10253642</p>
                                <p class="mb-1"><span class="text-muted">Payment Type: </span> Root</p>
                                <p class="mb-1"><span class="text-muted">Name: </span> John Doe</p>
                            </div> --}}
                        </div>

                        <div class="row p-5">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead class="thead-danger">
                                        <tr>
                                            <th scope="col" class="text-white">Date</th>
                                            <th scope="col" class="text-white">Day</th>
                                            <th scope="col" class="text-white">Time In</th>
                                            <th scope="col" class="text-white">Time Out</th>
                                            <th scope="col" class="text-white">Total Hours</th>
                                            <th scope="col" class="text-white">Activity</th>
                                            <th scope="col" class="text-white">Site Name</th>
                                            <th scope="col" class="text-white">Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{$datas->date}}</th>
                                            <td>{{$datas->day}}</td>
                                            <td>{{$datas->time_in}}</td>
                                            <td>{{$datas->time_out}}</td>
                                            <td>{{$datas->total_hours}}</td>
                                            <td>{{$datas->activity}}</td>
                                            <td>{{$datas->site_name}}</td>
                                            <td>{{$datas->remark}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>