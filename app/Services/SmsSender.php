<?php

namespace App\Services;

interface SmsSender{

    /**
     * Used to authenticate the Sms sender service.
     *
     * @return Object
     */
    public function authenticate();
    
    /**
     * Send the message to the given number.
     *
     * @param String $phone
     * @param String $message
     * @param String $uuid
     * @return Json
     */
    public function send($phone, $message, $uuid);

    /**
     * Returns the token after authentication.
     *
     * @return String
     */
    public function token();
}