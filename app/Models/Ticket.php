<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'systeme',
        'software_id',
        'status',
        'priority',
        'client_id',
        'admin_id',
        'dev_id',
        'signed_in',
        'signed_in_at',
    ];

    protected $casts = [
        'signed_in' => 'boolean',
        'signed_in_at' => 'datetime',
    ];



    public function isAssigned()
    {
        return !is_null($this->assigned_to);
    }


    // Relationships

    public function software()
    {
        return $this->belongsTo(Software::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function developer()
    {
        return $this->belongsTo(User::class, 'developer_id');
    }
}
