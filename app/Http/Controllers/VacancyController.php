<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use App\User;
use Illuminate\Support\Facades\Storage;

class VacancyController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$vacancies = Vacancy::orderBy('created_at','desc')->get();
        $vacancies = Vacancy::orderBy('created_at','desc')->paginate(10);
        return view('vacancy.index')->with('vacancies',$vacancies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacancy.create');
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
            'position' => 'required',
            'basic_salary' => 'required|integer',
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //handling uploading
        if($request->hasFile('cover_image')){
              //get the file name with extension
              $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
              //get just file name
              $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
              //get just extension
              $extension = $request->file('cover_image')->getClientOriginalExtension();
              //file name to Store
              $fileNameToStore = $filename.'_'.time().'.'.$extension;
              //upload the images
              $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }else{
          $fileNameToStore='noimage.jpg';
        }

        //create job Vacancy
        $vacancy = new Vacancy;
        $vacancy->vac_position = $request->input('position');
        $vacancy->vac_description = $request->input('description');
        $vacancy->basic_salary = $request->input('basic_salary');
        $vacancy->id =auth()->user()->id;
        $vacancy->cover_image= $fileNameToStore;
        $vacancy->save();

        return redirect('/vacancy')->with('success','Vacancy Added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = Vacancy:: find($id);
        return view('vacancy.show')->with('vacancy',$vacancy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy = Vacancy::find($id);


        //check for correct users

        if(auth()->user()->id != $vacancy->id && auth()->user()->id != 1){
            return redirect('/vacancy')->with('error','Unauthorized Page');
        }
        return view('vacancy.edit')->with('vacancy',$vacancy);
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
          'position' => 'required',
          'basic_salary' => 'required|integer',
          'description' => 'required',
          'cover_image' => 'image|nullable|max:1999'
      ]);

      //handling uploading
      if($request->hasFile('cover_image')){
            //get the file name with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //file name to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload the images
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

      }


      //update job Vacancy
      $vacancy =Vacancy::find($id);
      $vacancy->vac_position = $request->input('position');
      $vacancy->vac_description = $request->input('description');
      $vacancy->basic_salary = $request->input('basic_salary');
      if($request->hasFile('cover_image')){
        $vacancy->cover_image= $fileNameToStore;
      }
      $vacancy->save();

      return redirect('/vacancy')->with('success','Vacancy Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::find($id);

        //check for correct users
        if(auth()->user()->id != $vacancy->id && auth()->user()->id != 1 ){
            return redirect('/vacancy')->with('error','Unauthorized Page');
        }

        if($vacancy->cover_image != 'noimage.jpg'){
            //delete images
            Storage :: delete('public/cover_images/'.$vacancy->cover_image);

        }
        $vacancy->delete();
        return redirect('/vacancy')->with('success','Vacancy Removed');
    }
}
