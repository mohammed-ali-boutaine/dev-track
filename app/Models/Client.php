<?php

namespace App\Models;

class Client extends User
{
    protected $table = 'users'; // Uses the same table

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('client', function ($query) {
            $query->where('role', 'client');
        });
    }

    // A client has many tickets
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

