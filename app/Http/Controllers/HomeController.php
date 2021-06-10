<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') { // Role Admin
            $datas = Data::all();
            // dd($datas);
            return view('admin.index', compact('datas'));
        } elseif (Auth::user()->role == 'user') { // Role User
            $user = Auth::user();

            $datas = $user->datas;
            // dd($datas);
            return view('user.index', compact('datas'));
        }
    }
    
}