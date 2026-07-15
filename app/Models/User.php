<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'pass',
        'nick_name',
        'address1',
        'address2',
        'address3',
        'address4',
        'birth_date',
        'tel',
        'mail',
        'user_type',
    ];
}
