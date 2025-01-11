<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id', 'desc')
        ->take(10)->get();
        return view('Dashboard.coupon.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.coupon.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        try {
            //coupon_code 	coupon_description 	coupon_type 
            	// discount_value 	coupon_validity 	
                // count_coupon_limit 	used 
            	// start_date 	expire_date 	status
            $coupon = new Coupon();
            $coupon->coupon_code = $request->coupon_code ;
            $coupon->coupon_description = $request->coupon_description ;
            $coupon->coupon_type = $request->coupon_type;
            $coupon->discount_value = $request->discount_value ;
            if($request->coupon_validity == "permanent"){
                $coupon->coupon_validity = $request->coupon_validity;
            }else{
                $coupon->coupon_validity = $request->coupon_validity;

                $coupon->start_date = $request->start_date ;
                $coupon->expire_date = $request->expire_date ;
            }
           
            $coupon->count_coupon_limit = $request->count_coupon_limit ;
  if(isset($request->status) && $request->status == "on"){
    $coupon->status = "Active";
  }
  else{
    $coupon->status = "Inactive";
  }
            
           $coupon->save();
           
           toastr()->success(trans('messages.success'));
           return redirect()->route('coupon.create');
   
       }
   
       catch (\Exception $e){
         
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::findorfail($id);
        return view('Dashboard.coupon.edit',compact('coupon'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //dd($request);
        try {
            //coupon_code 	coupon_description 	coupon_type 
            	// discount_value 	coupon_validity 	
                // count_coupon_limit 	used 
            	// start_date 	expire_date 	status
            $coupon =Coupon::findorfail($request->id);
            $coupon->coupon_code = $request->coupon_code ;
            $coupon->coupon_description = $request->coupon_description ;
            $coupon->coupon_type = $request->coupon_type;
            $coupon->discount_value = $request->discount_value ;
            if($request->coupon_validity == "permanent"){
                $coupon->coupon_validity = $request->coupon_validity;
            }else{
                $coupon->coupon_validity = $request->coupon_validity;

                $coupon->start_date = $request->start_date ;
                $coupon->expire_date = $request->expire_date ;
            }
           
            $coupon->count_coupon_limit = $request->count_coupon_limit ;
  if(isset($request->status) && $request->status == "on"){
    $coupon->status = "Active";
  }
  else{
    $coupon->status = "Inactive";
  }
            
           $coupon->save();
           
           toastr()->success(trans('messages.success'));
           return redirect()->route('coupon.index');
   
       }
   
       catch (\Exception $e){
         
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
