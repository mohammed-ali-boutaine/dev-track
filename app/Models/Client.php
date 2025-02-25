<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Client extends User
{
    //
    protected $attributes = ['role' => 'client'];

}
