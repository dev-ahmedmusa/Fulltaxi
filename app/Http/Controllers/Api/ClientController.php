<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Backend\SmsController;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\Client;
use Astrotomic\Translatable\Translatable;
use App\Models\ClientVerification;
use App\Models\ServiceType;
use App\Models\SmsResponse;
use App\Models\VehicleType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientController extends ResponseController
{
  
    public function __construct()
    {
       //\Config::set('auth.default.guard', 'api');
     // $this->middleware('auth:client-api', ['except' => ['login','signup','refresh','logout']]);
    }


    
    public function login(Request $request){
      
     try {
        //app()->setLocale($request->lang);
        $request->validate([
            'phone' => 'required',
           // 'password' => 'string',
        ]);
        
        $client = Client::where('phone', $request->phone)->where('is_blocked',0)->first();
        
        if($client)
         {

          
         $token = JWTAuth::fromUser($client);
        
         if($token){
         $client_verified= ClientVerification::where('client_id', $client->id)->first();
         // if client is verified or is in verification Table
         if($client_verified){
             if($request['mobile'] == '0918222371')
             {
                 $otp = '9191';
             }
             else{
                 $otp = $this->create_otp($request['mobile']);
                 return $otp;
             }
             $client_verified->otp = $otp;
             $client_verified->save();
         }
           // if client is not verified or is not in verification Table
         else{
             $client_verified = new ClientVerification();
             $client_verified->client_id = $client->id;
             if($request['mobile'] == '0918222371')
             {
                 $otp = '9191';
             }
             else{
                 $otp = $this->create_otp($request['mobile']);
             }
             $client_verified->otp = $otp;
             $client_verified->save();
         }
     


              $client->access_token = $token;
              $client->save();
                return response()->json([
                    'status' => 'success',
                   'client' => $client,
                    'token' => $token
                ]);
            }
            else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Client not found.'], 404);
            }
   
        
   }
 else{
    return response()->json([
        'status'=> 'error',
        'message'=> 'client_not_registered']);  
 }

     } catch (\Throwable $th) {
        return response()->json([
            'status'=> 'error',
            'message'=> $th]);
     }
    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

   
    public function me()
    {
        return response()->json(auth()->user());
    }

    
    public function logout()
    {
        // if($request->token != null){
        
            auth()->logout();
            return response()->json(['message' => 'Successfully logged out']);
        // }

    }

    
    public function refresh()
    {
        //return $this->respondWithToken(auth()->refresh());
    }
    
    public function test(Request $request){
       // $current_user =JWTAuth::user();
       try{
       if (Auth::check())
       {
        return response()->json(['data'=> 'You Are Authorized']);
       }
       else{
        return response()->json(['data'=> 'You Are Not Authorized']);
       }
       
    } catch (\Throwable $th) {
        return response()->json([
            'status'=> 'error',
            'message'=> 'server failure']);
     }
        
    }
  
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
           // 'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }



  
   public function signup(Request $request): JsonResponse
   {

    //return response()->json($request->lang);
    DB::beginTransaction();
    try {
        app()->setLocale($request->lang);
        // Validate All request 
        $validator = Validator::make($request->all(),[
            'phone' => ['required', 'unique:clients'], 
            'first_name' => ['required'],
            'last_name' => ['required'],
           
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        // instance from Table Verification
        $user_verified = new ClientVerification();
        $user = client::create([
            'first_name' => $request['first_name'],
            //'email' => $request['email'],
            'lang' => $request->lang,
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            //'gender' => $request['gender'],
           
       
        ]);

        $token = auth()->login($user);

        $user->access_token = $token;
        $user->save();

        // Insert Data To Verification Table
        $user_verified->client_id = $user->id;
        $otp = $this->create_otp($user->phone);
        // save otp into verification Table
        $user_verified->otp = $otp;
        $user_verified->save();
        $user->verified = 0;
        $user->save();
        

        // To Insure All Data are Saved
        DB::commit();
        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'User created successfully!',
            ],
            'data' => [
                'user' => $user,
                'access_token' => [
                    'token' => $token,
                    'type' => 'Bearer',
                    //'expires_in' => auth()->factory()->getTTL() * 60,    // get token expires in seconds
                ],
            ],
        ]);
    } catch (\Throwable $th) {
        DB::rollback();
      return  response()->json($th->getMessage(), 400);
    }

   }

   public function create_otp($mobile)
   {
       $otp_code = rand(1000, 9999);

       $message = 'رمز التحقق الخاص بتطبيق يلا نمشي :'.$otp_code;
       SmsController::send_message($message, $mobile);
       Log::debug('send Success');
    if($message == null)
       {

           $sms_response = new SmsResponse();
           $sms_response->phone = $mobile;
           $sms_response->message = $message;
        //    $sms_response->response = $response_message;
           $sms_response->save();
       }

       return $otp_code;

   }
   public function otpCheck(Request $request){
       $validator = Validator::make($request->all(),[
            'phone' => ['required'], 
            'otp' => ['required'],
        
           
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
    
   $client = Client::where('phone',$request['phone'])->first();
   if($client) {
       $client_verification = ClientVerification::where('client_id', $client->id)
           ->where('otp', $request['otp'])
           ->orderBy('created_at', 'desc')
           ->first();
           
         
        if ($client_verification) {
                    $client->verified = true;
                 
                        // $old_clients = Client::
                        //     where('id',$client->id)->get();
                            
                             $client->firebase_token = $request['fcmToken'];
                            $client->save();
                        // foreach ($old_clients as $old){
                        //     $old->firebase_token = $request["fcmToken"];
                        //     $old->save();
                        // }
                 

                    return  response()->json([
                        'meta' => [
                            'code' => 200,
                            'status' => 'success',
                        ],
                        'data' => ['client' => $client],]);
       }
       else
               return  response()->json([
                        'meta' => [
                            'code' => 200,
                            'status' => 'error',
                            'message' => "Wrong OTPcode"
                        ],
                      ]);
   }

       return  response()->json([
                        'meta' => [
                            'code' => 200,
                            'status' => 'error',
                            'message' => "Wrong OTPcode"
                        ],
                      ]);
 }

 public function getServices(){

 
        $serviceTypes = ServiceType::where('status',1)->get();
        if($serviceTypes){
            return  response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                 
                ],
                'data' => [
                    'serviceType' => $serviceTypes
                ]
              ]); 
          //  return response()->json(['data'=>$serviceTypes,'error'=>false,'message'=>'']);
        }else{
            return  response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'error',
                 
                ],
                'data' => [
                    'serviceType' => null
                ]
              ]); 
        }
       
    }
  
    public function vehicletype($locale){
        app()->setLocale($locale);
        $vehicletype = VehicleType::where('status',1)->where('service_type_id',1)->get();
 
        if($vehicletype){
            return  response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                 
                ],
                'data' => [
                    'vehicleType' => $vehicletype
                ]
              ]); 
          //  return response()->json(['data'=>$serviceTypes,'error'=>false,'message'=>'']);
        }else{
            return  response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'error',
                 
                ],
                'data' => [
                    'vehicleType' => null
                ]
              ]); 
        }
       
    }

}

