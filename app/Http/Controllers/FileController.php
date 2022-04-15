<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Storage;

class FileController extends Controller
{
    public function create()
    {
        return view('create');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'filenames' => 'required',
                'filenames.*' => 'required',
        ]);

        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {

                //suformuojamas naujas atsitiktinis pavadinimas 
                $name = time().rand(1,100).'.'.$file->extension();
                //perkeliamas failas į norimą vietą
                $file->move(public_path('files'), $name);  

                //išsaugojamas senasis pavadinimas
                $file_old=$file->getClientOriginalName();
                $files = $name;  
                //įrašas į db abie bylą
                $file= new File();
                $file->filenames = $files;
                $file->filenames_orig = $file_old;
            
                $file->save();
            }
         }

        return back()->with('success', 'Duomenys įkelti');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = File::latest()->paginate(5);
        return view('list', ['file' => $file])->with('i',(request()->input('page', 1) - 1) * 5);
    }

    function getFile($id){
        $find = File::find($id);
        $path = public_path()."/files/".$find->filenames;
       /*if(file_exists($path)){
          return response()->download($path, $find->filenames);
       }else {
            return back()->with('fail', 'Toks failas nebeegzistuoja');
       }*/
       return response()->download($path, $find->filenames);
    }
}