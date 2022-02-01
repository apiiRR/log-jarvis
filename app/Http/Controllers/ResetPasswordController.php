<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function cekEmail($email)
    {
        $data = User::where('email', $email)->first();
        return response()->json($data);
    }

    public function update($email, $pass)
    {
        $update = User::where('email', $email)->update([
            'password' => Hash::make($pass),
        ]);

        return response()->json($update);
    }
}