<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"
        media="screen,print">

    <title>Pay Slip</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
        }

        * {
            font-size: 13px;
        }
    </style>
</head>

<body>
    @php
    // dd($datas[0]->to);
    $sub_earn = $pay_data->basic_sallary + $pay_data->bpjs_tk + $pay_data->basic_kes + $pay_data->overtime +
    $pay_data->certificate_allowance;
    $sub_deduc = $pay_data->tax + $pay_data->laptop;
    $date = date_create($pay_data->to);
    $bulan = date_format($date, "n");
    $namaBulan = "";
    switch ($bulan) {
    case "1":
    $namaBulan = "January";
    break;
    case "2":
    $namaBulan = "February";
    break;
    case "3":
    $namaBulan = "March";
    break;
    case "4":
    $namaBulan = "April";
    break;
    case "5":
    $namaBulan = "May";
    break;
    case "6":
    $namaBulan = "June";
    break;
    case "7":
    $namaBulan = "July";
    break;
    case "8":
    $namaBulan = "August";
    break;
    case "9":
    $namaBulan = "September";
    break;
    case "10":
    $namaBulan = "October";
    break;
    case "11":
    $namaBulan = "November";
    break;
    case "12":
    $namaBulan = "December";
    break;
    default:
    echo "Data tidak ditemukan ";
    }
    @endphp
    <div class="container mt-4">
        <div class="row no-gutters">
            <div class="col">
                <div>
                    <div style="float: right; padding-top: 10px;">
                        <img src="jarvis.png" alt="" width="60">
                    </div>
                    <div style="float: right;text-align: right; margin-right: 10px;">
                        <span><strong style="font-size: 15px">Jarvis Integrasi Solusi</strong></span><br>
                        <span>18 Office Park Lt.GF Unit 6</span><br>
                        <span>Jl. TB Simatupang No.18 RT.002 RW.001</span><br>
                        <span>Pasar Minggu - DKI Jakarta 12520</span><br>
                    </div>
                </div>
            </div>
        </div>
        <div style="content: ''; display: table; clear: both;"></div>

        <hr style="border: 3px double black;">

        <h5 class="text-center mt-5">Pay Slip {{ $namaBulan }} 2021</h5>
        <div class="row mt-4">
            <div class="col">
                <div style="float: left;">
                    <span>Name : <strong>{{ $pay_data->name }}</strong></span><br>
                    <span>Employee ID : <strong>{{ $pay_data->nip }}</strong></span><br>
                </div>
                <div style="float: right;">
                    <span>Title : <strong>{{ $pay_data->title }}</strong></span>
                </div>
            </div>
        </div>
        <div style="content: ''; display: table; clear: both;"></div>

        <div class="row">
            <div class="col">
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center"
                                style="background-color: rgb(159, 240, 93); border-width: 2px 2px 0 2px; border-style: solid; border-color: black;">
                                <th scope="col">Description</th>
                                <th scope="col">Earnings</th>
                                <th scope="col">Description</th>
                                <th scope="col">Deduction</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-left: 2px solid black; border-right: 2px solid black;">
                                <td>Basic Sallary</td>
                                <td>Rp. {{ number_format($pay_data->basic_sallary) }}</td>
                                <td>Tax</td>
                                <td>Rp. {{ number_format($pay_data->tax) }}</td>
                            </tr>
                            <tr style="border-left: 2px solid black; border-right: 2px solid black;">
                                <td>BPJS TK</td>
                                <td>Rp. {{ number_format($pay_data->bpjs_tk) }}</td>
                                <td>Laptop</td>
                                <td>Rp. {{ number_format($pay_data->laptop) }}</td>
                            </tr>
                            <tr style="border-left: 2px solid black; border-right: 2px solid black;">
                                <td>BPJS Kes Employer</td>
                                <td>Rp. {{ number_format($pay_data->bpjs_kes) }}</td>
                                <td rowspan="4" style="vertical-align: bottom;">Sub Total</td>
                                <td rowspan="4" style="vertical-align: bottom;">Rp. {{ number_format($sub_earn) }}</td>
                            </tr>
                            <tr style="border-left: 2px solid black; border-right: 2px solid black;">
                                <td>Overtime</td>
                                <td>Rp. {{ number_format($pay_data->overtime) }}</td>
                            </tr>
                            <tr style="border-left: 2px solid black; border-right: 2px solid black;">
                                <td>Certification Allowance</td>
                                <td>Rp. {{ number_format($pay_data->certificate_allowance) }}</td>
                            </tr>
                            <tr style="border-left: 2px solid black; border-right: 2px solid black;">
                                <td>Sub total</td>
                                <td>Rp. {{ number_format($sub_deduc) }}</td>
                            </tr>
                            <tr style="border: 2px solid black;">
                                <td colspan="3" class="text-center font-weight-bold"
                                    style="background-color: rgb(159, 240, 93);">Net Pay</td>
                                <td class="bg-warning"><i>Rp. {{ number_format($pay_data->total) }}</i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>