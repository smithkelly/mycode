<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupSms extends Model
{
      protected $fillable = [
    	'user_id', 'from','phone', 'message'
    ];
}
