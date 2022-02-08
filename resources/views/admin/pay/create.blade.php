@extends('layouts.master')

@section('content')
<form method="POST" action="{{ route('pay_slip.store') }}">
    @csrf
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Identity</h6>
        </div>

        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Name</label>
                    <select class="form-control" id="pilih-user" onchange="overtime()" name="pilih-user">
                        <option value="">-- Select Name --</option>
                        @foreach ($datas as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Title</label>
                    <input type="text" class="form-control" id="user-title" name="user-title">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Employee ID</label>
                    <input type="text" class="form-control" id="user-id" name="user-id" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">From</label>
                    <input type="date" class="form-control" id="tanggal-awal" name="tanggal-awal" onchange="overtime()">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">To</label>
                    <input type="date" class="form-control" id="tanggal-akhir" name="tanggal-akhir"
                        onchange="overtime()">
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Earnings</h6>
        </div>

        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Basic Sallary</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                        </div>
                        <input type="text" class="form-control number-separator" id="basic-sallary" name="basic-sallary"
                            onkeyup="earning()" value="0">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">BPJS TK</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                        </div>
                        <input type="text" class="form-control number-separator" id="bpjs-tk" name="bpjs-tk"
                            onkeyup="earning()" value="0">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">BPJS Kes Employer</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                        </div>
                        <input type="text" class="form-control number-separator" id="bpjs-kes" name="bpjs-kes"
                            onkeyup="earning()" value="0">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Certification Allowance</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                        </div>
                        <input type="text" class="form-control number-separator" id="certification" name="certification"
                            onkeyup="earning()" value="0">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Overtime Earning</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                        </div>
                        <input type="text" class="form-control number-separator" id="overtime-total" name="overtime-total"
                            onchange="earning()" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Sub Total Earning</h6>
        </div>

        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                        </div>
                        <input type="number" class="form-control" id="sub-earning" name="sub-earning" step="any"
                            readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Deduction</h6>
        </div>

        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tax</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                        </div>
                        <input type="text" value="0" class="form-control number-separator" id="tax" name="tax" onkeyup="deduction()">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Laptop</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                        </div>
                        <input type="text" value="0" class="form-control number-separator" id="laptop" name="laptop"
                            onkeyup="deduction()">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Sub Total Deduction</h6>
        </div>

        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                        </div>
                        <input type="number" class="form-control" id="sub-deduction" name="sub-deduction" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Total Pay</h6>
        </div>

        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                        </div>
                        <input type="number" class="form-control" id="net" name="net" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary col-md-12 mb-4" data-toggle="modal" data-target="#exampleModal"
        onclick="pay()">
        Show Pay Slip
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pay Slip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container mt-4">
                        <div class="row no-gutters">
                            <div class="col text-right">
                                <div class="d-flex justify-content-end">
                                    <div class="d-flex flex-column mr-3">
                                        <h4>PT Jarvis Integrasi Solusi</h4>
                                        <span>18 Office Park Lt.GF Unit 6</span>
                                        <span>Jl. TB Simatupang No.18 RT.002 RW.001</span>
                                        <span>Pasar Minggu - DKI Jakarta 12520</span>
                                    </div>
                                    <div>
                                        <img src="{{ asset('images/jarvis.png') }}" alt="" width="80">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr style="border: 3px double black;">

                        <h5 class="text-center mt-5">Pay Slip <span id="month-selected"></span> 2021</h5>
                        <div class="row mt-4">
                            <div class="col d-flex flex-column">
                                <span>Name : <strong id="pay-name"></strong></span>
                                <span>Employee ID : <strong id="pay-id"></strong></span>
                            </div>
                            <div class="col d-flex flex-column text-right">
                                <span>Title : <strong id="pay-title"></strong></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="table-responsive mt-4">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center text-white"
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
                                                <td id="pay-basic-sallary"></td>
                                                <td>Tax</td>
                                                <td id="pay-tax"></td>
                                            </tr>
                                            <tr style="border-left: 2px solid black; border-right: 2px solid black;">
                                                <td>BPJS TK</td>
                                                <td id="pay-bpjs-tk"></td>
                                                <td>Laptop</td>
                                                <td id="pay-laptop"></td>
                                            </tr>
                                            <tr style="border-left: 2px solid black; border-right: 2px solid black;">
                                                <td>BPJS Kes Employer</td>
                                                <td id="pay-bpjs-kes"></td>
                                                <td rowspan="4" style="vertical-align: bottom;">Sub Total</td>
                                                <td rowspan="4" style="vertical-align: bottom;" id="pay-sub-earning">
                                                </td>
                                            </tr>
                                            <tr style="border-left: 2px solid black; border-right: 2px solid black;">
                                                <td>Overtime</td>
                                                <td id="pay-overtime"></td>
                                            </tr>
                                            <tr style="border-left: 2px solid black; border-right: 2px solid black;">
                                                <td>Certification Allowance</td>
                                                <td id="pay-certificate"></td>
                                            </tr>
                                            <tr style="border-left: 2px solid black; border-right: 2px solid black;">
                                                <td>Sub total</td>
                                                <td id="pay-sub-deduction"></td>
                                            </tr>
                                            <tr style="border: 2px solid black;">
                                                <td colspan="3" class="text-center font-weight-bold text-white"
                                                    style="background-color: rgb(159, 240, 93);">Net Pay</td>
                                                <td class="bg-warning text-white" id="pay-net"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/easy-number-separator.js') }}"></script>
<script>
    const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
        "November", "December"
    ];

    let user = $('#pilih-user')
    let title = $('#user-title')
    let id = $('#user-id')
    let awal = $('#tanggal-awal')
    let akhir = $('#tanggal-akhir')
    let overtime_tot = $('#overtime-total')
    let basic_sallary = $('#basic-sallary')
    let bpjs_kes = $('#bpjs-kes')
    let bpjs_tk = $('#bpjs-tk')
    let certification = $('#certification')
    let sub_earning = $('#sub-earning')
    let tax = $('#tax')
    let laptop = $('#laptop')
    let sub_deduction = $('#sub-deduction')
    let net = $('#net')
    let sub1 = 0
    let sub2 = 0
    let tot = 0
    let format = new Intl.NumberFormat('id-ID');

    let pay_name = $('#pay-name')
    let pay_id = $('#pay-id')
    let pay_title = $('#pay-title')
    let pay_basic_sallary = $('#pay-basic-sallary')
    let pay_bpjs_tk = $('#pay-bpjs-tk')
    let pay_bpjs_kes = $('#pay-bpjs-kes')
    let pay_overtime = $('#pay-overtime')
    let pay_certification = $('#pay-certificate')
    let pay_sub_earning = $('#pay-sub-earning')
    let pay_tax = $('#pay-tax')
    let pay_laptop = $('#pay-laptop')
    let pay_sub_deduction = $('#pay-sub-deduction')
    let pay_net = $('#pay-net')
    let month_selected = $('#month-selected')

    $('body').on('change', '#pilih-user', function () {
        $.get('user/' + user.val(), function (data) {
            $('#user-id').val(data.nip)
        })
    })

    function overtime() {
        if ((user.val() != "") && (awal.val() != "") && (akhir.val() != "")) {
            $.get('/pay_slip/overtime/' + user.val() + '/' + awal.val() + '/' + akhir.val(), function (data) {
                parseFloat(overtime_tot.val(data))
                // console.log(data)
                earning()
                net_total()
            })
        }
    }

    function earning() {
        sub1 = parseFloat(basic_sallary.val().replace(/,/g, '')) + parseFloat(bpjs_kes.val().replace(/,/g, '')) + parseFloat(bpjs_tk.val().replace(/,/g, '')) + parseFloat(
            certification.val().replace(/,/g, '')) + parseFloat(overtime_tot.val().replace(/,/g, ''))
        sub_earning.val(sub1)
        net_total()
    }

    function deduction() {
        sub2 = parseFloat(tax.val().replace(/,/g, '')) + parseFloat(laptop.val().replace(/,/g, ''))
        sub_deduction.val(sub2)
        net_total()
    }

    function net_total() {
        tot = parseFloat(sub1) - parseFloat(sub2)
        net.val(tot)
    }

    function pay() {
        let text = akhir.val().substring(5, 7)
        month_selected.html(month[parseInt(text) - 1])
        pay_name.html($('#pilih-user option:selected').text())
        pay_id.html(id.val())
        pay_title.html(title.val())
        pay_basic_sallary.html("Rp. " + format.format(parseFloat(basic_sallary.val().replace(/,/g, ''))))
        pay_bpjs_tk.html("Rp. " + format.format(parseFloat(bpjs_tk.val().replace(/,/g, ''))))
        pay_bpjs_kes.html("Rp. " + format.format(parseFloat(bpjs_kes.val().replace(/,/g, ''))))
        pay_overtime.html("Rp. " + format.format(parseFloat(overtime_tot.val().replace(/,/g, ''))))
        pay_certification.html("Rp. " + format.format(parseFloat(certification.val().replace(/,/g, ''))))
        pay_sub_earning.html("Rp. " + format.format(sub_deduction.val()))
        pay_tax.html("Rp. " + format.format(parseFloat(tax.val().replace(/,/g, ''))))
        pay_laptop.html("Rp. " + format.format(parseFloat(laptop.val().replace(/,/g, ''))))
        pay_sub_deduction.html("Rp. " + format.format(sub_earning.val()))
        pay_net.html("Rp. " + format.format(net.val()))
    }

    /* $('body').on('change', '.overtime', function () {
        let id = $(this);
        console.log(id)
        $.get('overtime/' + id, function (data) {
            console.log(data.items)
        })
    }) */
    easyNumberSeparator({
        selector: '.number-separator',
        separator: ',',
    })
</script>
@endsection