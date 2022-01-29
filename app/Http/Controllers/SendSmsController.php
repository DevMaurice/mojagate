<?php

namespace App\Http\Controllers;

use App\Services\Moja;
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
        
        $result = Moja::send('254714692255','Message test','12345test');

        dd($result);

        //save data
    }
}
