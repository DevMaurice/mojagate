<?php

return [
    /**
     * Set moja gate API url 
     * 
     */
    'url' => env('MOJAGATE_URL','https://api.mojasms.dev'),

    /**
     * Set Moja gate basic authentication email.
     * 
     */
    'email' => env('MOJAGATE_USERNAME'),

    /**
     * Set Moja gate basic authentication password.
     * 
     */
    'password' => env('MOJAGATE_PASSWORD')
];