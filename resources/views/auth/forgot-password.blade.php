@extends('layouts.app')

@section('content')
<style>
    #reset,
    #pass {
        display: none;
    }
</style>

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-sm-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Reset Password!</h1>
                    </div>
                    <form class="user">
                        <div class="form-group">
                            <input id="email" type="email" placeholder="Email Address"
                                class="form-control form-control-user @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group" id="pass">
                            <input id="password" type="password" placeholder="Password"
                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                name="password" required>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button id="reset" type="button" class="btn btn-success btn-user btn-block">
                            Reset Password
                        </button>
                        <button id="cek" type="button" class="btn btn-primary btn-user btn-block">
                            Check !
                        </button>
                    </form>
                    <hr>
                    {{-- <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div> --}}
                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script>
    let email = $('#email');
    $('body').on('click', '#cek', function () {
        // console.log(email.val());
        $.get('cekEmail/' + email.val(), function (data) {
            if (!$.isEmptyObject(data)) {
                $('#pass').css('display', 'block');
                $('#reset').css('display', 'block');
                $('#cek').css('display', 'none');
            } else {
                alert('Email yang anda cari tidak ditemukan!')
            }
        })
    })

    let pass = $('#password');
    $('body').on('click', '#reset', function () {
        // console.log(email.val());
        $.get('updateEmail/' + email.val() + '/' + pass.val(), function (data) {
            if (data) {
                alert('Reset Password Berhasil. Silahkan Login Kembali.');
                location.reload()
            } else {
                alert('Reset Password Gagal');
            }
        })
    })
</script>
@endsection