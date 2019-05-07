<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class GiftSms extends Model
{
    //
    protected $fillable = [
    	'from_user_id','to_user_id','unit'
    ];

    public function fromUser()
    {
    	return $this->belongsTo(User::class);
    }

    public function toUser()
    {
    	return $this->belongsTo(User::class);
    }
}
