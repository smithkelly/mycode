<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageStatus extends Model
{
    protected $fillable = [
    	'to','messageId','status', 'group_sms_id'
    ];
}
