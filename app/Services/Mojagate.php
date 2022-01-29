<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Mojagate  implements SmsSender
{
    protected $email;

    protected $password;

    protected $url;

    protected $token = null;

    public function __construct(String $email, String $password) {
        $this->email = $email;
        $this->password = $password;

        $this->url = config('mojagate.url');

        $this->authenticate();
    }

    /**
     * Authenticate the service.
     *
     * @return void
     */
    public function authenticate()
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        $data = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        $token = Http::withHeaders($headers)->post($this->url.'/login',$data)->json();

        Cache::put('token',$token['data']['token']);
    }

    /**
     * Send a message
     *
     * @param String $phone
     * @param String $message
     * @param String $uuid
     * @return void
     */
    public function send($phone, $message, $uuid)
    {
       if(is_null($this->token())){
           $this->authenticate();
       }

       $headers = [
            'Authorization' => 'Bearer '.$this->token(),
            'Accept' => 'application/json',
       ];

       $data =[
            'from' => 'MOJAGATE',
            'phone' => $phone,
            'message' => $message,
            'message_id' => $uuid,
            'webhook_url' => config('mojagate.webhook'),
        
        ];
        
        return  Http::withHeader($headers)->post($this->url.'/sendsms',['json' => $data])->json();
    }
    /**
     * Get the current saved token.
     *
     * @return void
     */
    public function token()
    {
        if(Cache::get('token')){
            
            return $this->token(); 
        }
        $this->authenticate();

        return Cache::get('token');              
    }
}
