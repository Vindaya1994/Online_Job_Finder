<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use App\User;
use Illuminate\Support\Facades\Storage;
use DB;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $company_data = User::where('category','Company')->get();
      return view('admin.index')->with('company_data',$company_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $company = User:: find($id);
      if(auth()->user()->id != 1){
          return redirect('/vacancy')->with('error','Unauthorized Page');
      }
      return view('admin.show')->with('company',$company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $company = User::find($id);


      //check for correct users
      if(auth()->user()->id != 1){
          return redirect('/admin')->with('error','Unauthorized Page');
      }
      return view('admin.edit')->with('company',$company);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
          'company_name' => 'required',
          'company_location' => 'required'
      ]);


      //update company data
      $company =User::find($id);
      $company->company_name = $request->input('company_name');
      $company->company_location = $request->input('company_location');
      $company->save();
      return redirect('/admin')->with('success','Company Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $company = User::find($id);
      $vac_id =Vacancy::where('id', $company)->get('vac_id');
      echo $vac_id;
      $vac = Vacancy::find($vac_id);

      //check for correct users
      if(auth()->user()->id != 1){
          return redirect('/vacancy')->with('error','Unauthorized Page');
      }

      /*DB::transaction(function()
        {
            $this->vacancies()->delete();
            $this->user()->delete();
            parent::delete();
        });*/

      $company->delete();
      $vac->delete();

      return redirect('/admin')->with('success','Company Removed');
    }
}
