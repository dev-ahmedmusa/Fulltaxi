<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadTrait;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    use UploadTrait;
    public function index()
    {
        $serviceTypes = ServiceType::all();
       
        return view('Dashboard.serviceType.index',compact('serviceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('Dashboard.serviceType.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    // ServiceType::create([
    //         'name' => $request->input('name'),
    //         'note' => $request->input('note'),
    //     ]);
   

    //     session()->flash('add');
    //     return redirect()->route('serviceType.index');
    try{

        $ServiceType = new ServiceType();
        $ServiceType->name = $request->input('name');
        $ServiceType->note = $request->input('note');
        //$ServiceType->service_id = $request->input('service_id');
         //Upload img
         $is_upload = $this->verifyAndStoreImage($request,'image','serviceType','uploadFiles');
        if($is_upload){
            $ServiceType->image = $is_upload;
        }
        $ServiceType->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('serviceType.index');

    }

    catch (\Exception $e){
      
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceType $ServiceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceType $ServiceType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $section = ServiceType::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
            'note' => $request->input('note'),
        ]);
        session()->flash('edit');
        return redirect()->route('serviceType.index');
    }


    public function destroy($request)
    {
        ServiceType::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('serviceType.index');
    }
}

