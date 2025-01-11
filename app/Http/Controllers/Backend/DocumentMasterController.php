<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DocumentMaster;

class DocumentMasterController extends Controller
{
   
    public function index()
    {
        $documents = DocumentMaster::all();
        return view('Dashboard.document.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.document.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //dd($request);

try {
    $doc =new DocumentMaster();
    $doc->name = $request->name;
    $doc->name_ar = $request->name_ar;
    $doc->doc_type = $request->doc_type;
    $doc->expire_valid_for = $request->expire_valid_for;
   
    if(isset($request->status) && $request->status == "on"){
        $doc->status = "Active";
      }
      else{
        $doc->status = "Inactive";
      }
      $doc->save();
     
      toastr()->success(trans('messages.success'));
      return redirect()->route('document.index');

  }

  catch (\Exception $e){
    
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentMaster $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentMaster $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $doc = DocumentMaster::findOrFail($request->id);
            $doc->name = $request->name;
            $doc->name_ar = $request->name_ar;
            $doc->doc_type = $request->doc_type;
            $doc->expire_valid_for = $request->expire_valid_for;
           
            if(isset($request->status) && $request->status == "on"){
                $doc->status = "Active";
              }
              else{
                $doc->status = "Inactive";
              }
              $doc->save();
             
              toastr()->success(trans('messages.success'));
              return redirect()->route('document.index');
        
          }
        
          catch (\Exception $e){
            
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
    }


    public function destroy($request)
    {
        DocumentMaster::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('document.index');
    }

}