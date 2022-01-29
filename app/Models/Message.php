<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected $casts = [
        'sent_at' => 'timestamp',
        'delivered_at' => 'timestamp'
    ];

    public function isSent()
    {
        return !is_null($this->sent_at);
    }

    public function isDelivered()
    {
        return !is_null($this->delivered_at);
    }
}
