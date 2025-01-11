<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Traits\UploadTrait;
use App\Models\DocumentList;
use App\Models\DocumentMaster;
use App\Models\DocumentMasterTranslation;
use App\Models\Driver;
use App\Models\DriverVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DriverController extends Controller
{
   use UploadTrait;
    public function index()
    {
        $drivers = Driver::all();
        return view('Dashboard.drivers.index',compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $path = resource_path('json/countries.json');

        // Check if the file exists
        if (!File::exists($path)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        // Get the file content
        $json = File::get($path);

        // Decode the JSON data into an array
        $countries = json_decode($json, true);
        $documents = DocumentMaster::where(
            // [
            //     ['doc_type', '=', 'Driver'],
            //     ['doc_type', '=', 'Vehicle'],
            // ]
           'doc_type', 'Driver')
            ->orWhere('doc_type', 'Vehicle'
          )->get();
          $documents_count = count($documents);
        //dd($documents);
        return view('Dashboard.drivers.add',compact('countries','documents','documents_count'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
  



       DB::beginTransaction();

       try {

           // Strore Data Into Drivers Table 
           $ifno_driver = new Driver();
           $ifno_driver->first_name = $request->first_name;
           $ifno_driver->last_name = $request->last_name;
           $ifno_driver->country_code = $request->country_code;
           $ifno_driver->phone = $request->phone;
           $ifno_driver->email = $request->email;
           $ifno_driver->password = $request->password;
           $ifno_driver->gender = $request->gender;
           $ifno_driver->lang = "ar";
           $ifno_driver->is_blocked = 0; 
           $ifno_driver->status = 0;
           $ifno_driver->save();
 
           // Store Data Into Driver Vehicle Table
           $driverVehicle = new DriverVehicle();
           $driverVehicle->make_id = $request->make_id;
           $driverVehicle->driver_id  = $ifno_driver->id;
           $driverVehicle->vehicle_model_id = $request->vehicle_model_id;
           $driverVehicle->year = $request->year;
           $driverVehicle->color = $request->color;
           $driverVehicle->plate_number = $request->plate_number;
           $driverVehicle->status = 0;
           $driverVehicle->save();

           // Store Data or Upload Doc of Driver Into Document List Table
       
           $documents = DocumentMaster::where('doc_type', 'Driver')
                        ->orWhere('doc_type', 'Vehicle')->get();
       
             foreach ($request->allFiles() as $key => $value ) {

           $docIds = DocumentMaster::where('name',$key)
           ->get(['id']);
           //dd($docs);
           $index = 0;
              $driverDocs = new DocumentList();
    
            //   if($key == "Personal_Image"){
            //     $is_upload = $this->verifyAndStoreImageForDrivers($request,"Personal_Image",'driverDocs',$ifno_driver->id,'uploadFiles');
            //     if($is_upload){
            //         $driver =Driver::findorFail($ifno_driver->id);
            //         $driver->image = $is_upload;
            //     }
              
            // }
                         $is_upload = $this->verifyAndStoreImageForDrivers($request,$key,'driverDocs',$ifno_driver->id,'uploadFiles');
              if($is_upload){
               
                  $driverDocs->doc_file = $is_upload;
                  $driverDocs->docmaster_id = $docIds[$index]->id;
           
                  $driverDocs->driver_id = $ifno_driver->id;
                  $driverDocs->status = 1;
          $index++;
           }
             $driverDocs->save();
           
           }
 

           DB::commit();
           toastr()->success(trans('messages.success'));
           return redirect()->route('drivers.index');

       
    }
       catch (\Exception $e) {
           DB::rollback();
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
     }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
