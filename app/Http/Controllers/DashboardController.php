<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Vacancy;



class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=auth()->user()->id;
        $user= User::find($id);
        $vacancies = Vacancy::where('id','LIKE',"%{$id}%")->get();

        if(auth()->user()->category=='Company'){
            return view('dashboard')->with('vacancies', $vacancies);
        }elseif(auth()->user()->category=='Applicant'){
            return view('dashboard');
        }else{
            return view('dashboard');
        }
    }
}
