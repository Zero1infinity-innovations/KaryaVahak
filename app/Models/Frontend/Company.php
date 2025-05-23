<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";
    protected $fillable = ['name', 'coname', 'email', 'phone', 'address', 'logo', 'password', 'status', 'paid'];
}
