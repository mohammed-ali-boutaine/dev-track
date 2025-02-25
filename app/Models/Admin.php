<?php

namespace App\Models;

use App\Models\User;

// use Illuminate\Database\Eloquent\Model;


class Admin extends User {
    protected $attributes = ['role' => 'admin'];
}
