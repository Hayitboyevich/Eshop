<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = 
    [
    	'customer_name', 
    	'customer_email',
    	'customer_phone', 
    	'password',
    ];
}
