<?php
  
namespace App\Services;
  
use Illuminate\Support\Facades\Facade;
  
class Moja extends Facade{

    protected static function getFacadeAccessor() {
        return 'mojagate';
    }
}