<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Developper extends User
{
    //
    protected $attributes = ['role' => 'developer'];

}
