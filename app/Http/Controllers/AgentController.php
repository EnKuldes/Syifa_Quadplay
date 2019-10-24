<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\_dapros;

class AgentController extends Controller
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
        return view('agent.index');
    }

    /**
     * Mencari data
     */
    public function getData()
    {
    	$data = _dapros::all()->random(1);
        return response()->json($data);
    }
}
