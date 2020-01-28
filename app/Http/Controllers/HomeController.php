<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //return view('home');
        if (auth()->user()->divisi == "Agent") {
            return redirect('/agent');
        }
        elseif (auth()->user()->divisi == "QCO") {
            return redirect('/qco');
        }
        elseif (auth()->user()->divisi == "Inputter") {
            return redirect('/inputter');
        }elseif (auth()->user()->divisi == "Admin") {
            return redirect('/admin');
        }
        abort(421, "Misdirected Request!");
    }
}
