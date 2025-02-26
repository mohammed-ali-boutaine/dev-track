<?php

namespace App\Models;

class Developer extends User
{
    protected $table = 'users';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('developer', function ($query) {
            $query->where('role', 'developer');
        });
    }
}

