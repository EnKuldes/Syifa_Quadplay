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
        if (auth()->user()->level == "Agent") {
            return redirect('/agent');
        }
        elseif (auth()->user()->level == "QCO") {
            return redirect('/qco');
        }
        elseif (auth()->user()->level == "Inputter") {
            return redirect('/inputter');
        }elseif (auth()->user()->level == "Admin") {
            return redirect('/admin');
        }
        abort(421, "Misdirected Request!");
    }
}
