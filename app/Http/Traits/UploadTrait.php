<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadTrait
{


    // public function uploadFile($request, $inputname , $foldername , $disk,)

    // {

    // if ($request->hasFile($inputname)) {

    // $file = $request->file($inputname);

    // $fileName = time() . '.' . $file->getClientOriginalExtension();

    // // Store the file in the specified directory

    // $request->file($fileName)->storeAs('attachments/',$foldername.'/'.$fileName);

    // return $fileName;

    // }

    // return null;

    // }

    public function verifyAndStoreImage($request, $inputname , $foldername , $disk) {

        if( $request->hasFile( $inputname ) ) {

            // Check img
            if (!$request->file($inputname)->isValid()) {
                flash('Invalid Image!')->error()->important();
                return redirect()->back()->withInput();
            }

            $photo = $request->file($inputname);
            // $name = \Str::slug($request->input('name'));
            $filename = time() . '.' . $photo->getClientOriginalExtension();

          

            // insert Image

            return $request->file($inputname)->storeAs($foldername, $filename, $disk);
        }

        return null;

    }

    public function verifyAndStoreImageForDrivers($request, $inputname , $foldername ,$driverIdFolder  , $disk) {

        if( $request->hasFile( $inputname ) ) {

            // Check img
            if (!$request->file($inputname)->isValid()) {
                flash('Invalid Image!')->error()->important();
                return redirect()->back()->withInput();
            }

            $photo = $request->file($inputname);
         
            $filename = md5($request->file($inputname) . time()). '.' . $photo->getClientOriginalExtension();

            // insert Image

            return $request->file($inputname)->storeAs($foldername .'/'. $driverIdFolder, $filename, $disk);
        }

        return null;

    }

    public function deleteFile($name)
    {
        $exists = Storage::disk('uploadFiles')->exists('attachments/library/'.$name);

        if($exists)
        {
            Storage::disk('uploadFiles')->delete('attachments/library/'.$name);
        }
    }
}
