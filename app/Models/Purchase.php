<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
     protected $fillable = [
    	'from_user_id','unit','amount','txtref','purchase_ref','purchase_status'
    ];
}
