<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use App\User;
use App\Candidate;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //$vacancy = Vacancy:: find($id);
        //echo $vacancy;
        //return view('candidate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
          'cv_application' => 'required|mimes:pdf|max:10000'
      ]);

      //handling uploading
      if($request->hasFile('cv_application')){
            //get the file name with extension
            $filenameWithExt = $request->file('cv_application')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cv_application')->getClientOriginalExtension();
            //file name to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload the images
            $path = $request->file('cv_application')->storeAs('public/cv',$fileNameToStore);

      }else{
        $fileNameToStore='noimage.jpg';
      }

      //create job Vacancy
      $candidate = new Candidate;

      //$candidate->vac_id = $request->input('basic_salary');
      $candidate->id =auth()->user()->id;
      $candidate->cv= $fileNameToStore;
      $candidate->vac_id = $request->input('vac_id');
      $candidate->save();

      return redirect('/vacancy')->with('success','Application Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $vacancy = Vacancy:: find($id);
      //echo $vacancy;
      return view('candidate.create')->with('vacancy',$vacancy);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
