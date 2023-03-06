<?php

namespace App\Http\controllers\Admin;
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;
use App\Models\form_basic;
use Brian2694\Toastr\Facades\Toastr;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //view page
    public function index()
    {
        //$data = DB::table('form_basics')->get();
        $data = form_basic::all();
        return view('form',compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
    //     //
    }

 
    //save recode
    public function saveRecord(Request $request)
    {
        $request->validate([
            'name' => 'required|string| max:255',
            'age' => 'required|numeric',
            'gender' => 'required|in:male,female',
            'email' => 'required|email',
            'upload' => 'required|max:1024',
        ]);

      DB::beginTransaction();
      try {
          // upload file
        //    $folder_name= 'upload';
        //    \Storage::disk('local')->makeDirectory($folder_name, 0775, true); //creates directory
        //    if ($request->hasFile('upload')) {
        //        foreach ($request->upload as $photo) {
        //            $destinationPath = $folder_name.'/';
        //           $file_name = $photo->getClientOriginalName(); //Get file original name                   
        //           \Storage::disk('local')->put($folder_name.'/'.$file_name,file_get_contents($photo->getRealPath()));
        //       }
        //    }
        //   $filename = time().$request->file('upload')->getClientOriginalName();
          $file = $request->file('upload')->store('laravel_file');

          $form = new form_basic;
          $form->name    = $request->name;
          $form->age     = $request->age;
          $form->gander  = $request->gander;
          $form->email   = $request->email;
          $form->upload  = $file;
          $form->save();
          
          DB::commit();
          // Toastr::success('Create new holiday successfully :)','Success');
          return redirect()->back();
          
      } catch(\Exception $e) {
          DB::rollback();
          // Toastr::error('Add Holiday fail :)','Error');
          return redirect()->back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //download
    public function download($id)
    {
        $data = DB::table('form_basics')->where('id',$id)->first();
        $filepath = storage_path("app/{$data->upload}");
        return \Response::download($filepath);
    }

    
}
