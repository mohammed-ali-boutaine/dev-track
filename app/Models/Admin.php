<?php

namespace App\Models;

class Admin extends User
{
    protected $table = 'users';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('admin', function ($query) {
            $query->where('role', 'admin');
        });
    }
}
