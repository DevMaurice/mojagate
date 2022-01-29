<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessSmsDeliveryQueue;
use App\Models\Message;
use App\Services\Moja;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SendSmsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $uuid = Str::uuid();

        $message = 'This is a moja gate sms test';


        $message = Message::create([
            'phone' => request('phone'),
            'message' => $message,
            'tracking_code' => $uuid,
        ]);

        $result = Moja::send(request('phone'), $message, $uuid);

        if($result['status'] =='Success'){
            $message->sent_at = Carbon::parse($request['data']['recipients'][0]['created_at']);

            $message->update();
        }      
    }


    public function delivery()
    {
        ProcessSmsDeliveryQueue::dispatch(request()->all());
    }
}
