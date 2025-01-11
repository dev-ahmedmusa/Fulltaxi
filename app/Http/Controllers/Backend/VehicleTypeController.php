<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadTrait;
use App\Models\ServiceType;
use App\Models\VehicleType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleTypeController extends Controller
{
    use UploadTrait;

    public function index()
    {  
        $vehicleTypes = VehicleType::all();
        return view('Dashboard.vehicleType.index',compact('vehicleTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $serviceType = ServiceType::all();
       return view('Dashboard.vehicleType.add',compact('serviceType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
    //dd($request);
    try{
      // dd($request);
        // $phone = substr($request->phone,1);
        // $vehicle_phone = vehicle::where('phone', $phone)->first();
        $validatedData = $request->validateWithBag('vehicle_types', [
            'name' => ['required'],
            'service_type_id' => ['required'],
            //'image' => ['required'],
        ]);

        
        
     
        // if($vehicle_phone) return redirect()->back()->with('alert', __('strings.mobile_exist'));
        $vehicle = new VehicleType();
        $vehicle->person_size = $request->person_size;
        $vehicle->radius = $request->radius;

        $vehicle->service_type_id = $request->service_type_id;
        $vehicle->waiting_feet_time_limit =$request->waiting_feet_time_limit;
        $vehicle->trip_deduction_percent =$request->trip_deduction_percent;
        $vehicle->trip_deduction_amount =$request->trip_deduction_amount;
        $vehicle->minPrice =$request->minPrice;
        $vehicle->baseFare =$request->baseFare;
        $vehicle->pricePerKM =$request->pricePerKM;
        $vehicle->pricePerMin = $request->pricePerMin;
        $vehicle->waiting_fees = $request->waiting_fees;
        $vehicle->daySurgeStart = $request->daySurgeStart;
        $vehicle->daySurgeEnd = $request->daySurgeEnd;
        $vehicle->nightSurgeStart = $request->nightSurgeStart;
        $vehicle->nightSurgeEnd = $request->nightSurgeEnd;
        $vehicle->daySurgepriceKM = $request->daySurgepriceKM;
        $vehicle->nightSurgepriceKM = $request->nightSurgepriceKM;
        
        $vehicle->status = 1;
         $vehicle->save();
        //
        

        // insert into translation

        $vehicle->name = $request->name;
        $vehicle->note = $request->note;
        $vehicle->save();
      
         //Upload img
         $is_upload = $this->verifyAndStoreImage($request,'image','vehicle','uploadFiles');
        if($is_upload){
            $vehicle->vehicleImage = $is_upload;
            
        }
        $vehicle->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('vehicleType.index');

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
    {    $serviceType = ServiceType::all();
        $vehicle = VehicleType::findorfail($id);
        return view('Dashboard.vehicleType.edit',compact('serviceType','vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::beginTransaction();

        try {

            $vehicle = VehicleType::findorfail($request->id);

            $vehicle->person_size = $request->person_size;
            $vehicle->radius = $request->radius;
    
            $vehicle->service_type_id = $request->service_type_id;
            $vehicle->waiting_feet_time_limit =$request->waiting_feet_time_limit;
            $vehicle->trip_deduction_percent =$request->trip_deduction_percent;
            $vehicle->trip_deduction_amount =$request->trip_deduction_amount;
            $vehicle->minPrice =$request->minPrice;
            $vehicle->baseFare =$request->baseFare;
            $vehicle->pricePerKM =$request->pricePerKM;
            $vehicle->pricePerMin = $request->pricePerMin;
            $vehicle->waiting_fees = $request->waiting_fees;
            $vehicle->daySurgeStart = $request->daySurgeStart;
            $vehicle->daySurgeEnd = $request->daySurgeEnd;
            $vehicle->nightSurgeStart = $request->nightSurgeStart;
            $vehicle->nightSurgeEnd = $request->nightSurgeEnd;
            $vehicle->daySurgepriceKM = $request->daySurgepriceKM;
            $vehicle->nightSurgepriceKM = $request->nightSurgepriceKM;
            
            $vehicle->status = 1;
             $vehicle->save();
            //
            
    
            // insert into translation
    
            $vehicle->name = $request->name;
            $vehicle->note = $request->note;
            $vehicle->save();

           

            // update photo
            if ($request->has('image')){
                // Delete old photo
                if ($vehicle->vehicleImage){
                    $old_img = $vehicle->vehicleImage->filename;
                    $this->Delete_attachment('upload_image','vehicles/'.$old_img,$request->id);
                }
                //Upload img
                $this->verifyAndStoreImage($request,'image','vehicle','uploadFiles');
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->back();

        }
        catch (\Exception $e) {
            DB::rollback();
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
