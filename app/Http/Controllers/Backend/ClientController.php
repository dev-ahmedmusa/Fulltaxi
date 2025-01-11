<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\UploadTrait;
use App\Models\Client;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    use UploadTrait;

    public function index()
    {

        $clients = Client::all();
        return view('Dashboard.client.index',compact('clients'));
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
        return view('Dashboard.client.add',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    //dd($request);
        try{
      
        // $phone = substr($request->phone,1);
        // $client_phone = client::where('phone', $phone)->first();
    
        // if($client_phone) return redirect()->back()->with('alert', __('strings.mobile_exist'));
        $client = new Client();
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->password = Hash::make($request->password);
        $client->gender = $request->gender;
        $client->status = 1;
      
        

        // insert img
      
         //Upload img
         $is_upload = $this->verifyAndStoreImage($request,'image','client','uploadFiles');
        if($is_upload){
            $client->image = $is_upload;
        }
        $client->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('client.create');

    }

    catch (\Exception $e){
      
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $passenger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $passenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $passenger)
    {
        //
    }
}
