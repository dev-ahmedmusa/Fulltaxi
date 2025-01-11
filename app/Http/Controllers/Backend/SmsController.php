<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

use Illuminate\Support\Facades\Log;
class SmsController extends Controller
{
 

    public static function send_message($text, $mobile_number)
    {
        $accountSid = env('ACCOUNT_SID');
        $authToken = env('AUTH_TOKEN');
        $twilioNumber = env('TWILIO_NUMBER');
        $twilioClient = new Client($accountSid, $authToken);
    $response = "error";
    try {
        $twilioClient->messages->create(
            $mobile_number, // to phone
            [
                'from' => $twilioNumber,
                  "messagingServiceSid" => "MG9df164f2e54836b42ec1789808e2c790 ",
                'body' => $text
            ]
        );

       $response = "Success";
        Log::debug($response);
    } catch (\Exception $e) {
        
        Log::debug($response);
       // return back()->withInput()->withErrors(['error' => 'Failed to send SMS.']);
    }

// return $response;

     }
}
