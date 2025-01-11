<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CancelReason;
use Illuminate\Http\Request;

class CancelReasonController extends Controller
{


   
    public function index()
    {
        $reasons = CancelReason::all();
       return view('Dashboard.cancelReason.index',compact('reasons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // return view('Dashboard.cancelReason.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request); 
        try {
            CancelReason::create([
              'reason' => $request->reason,
              'for_user' => $request->for_user,
              'status' => 1 ,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('cancelReason.index');
    
        }
    
        catch (\Exception $e){
          
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

       // dd($request);
        try {
         $reason = CancelReason::findorfail($request->id);
         if($reason){
            $reason->update([
                'reason' => $request->reason,
                'for_user' => $request->for_user,
                'status' => $request->status,
            ]);
         }

            session()->flash('edit');
            return redirect()->route('cancelReason.index');
    
        }
    
        catch (\Exception $e){
          
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
