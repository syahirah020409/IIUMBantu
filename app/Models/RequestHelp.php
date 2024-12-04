<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RequestHelp extends Model
{
    use HasFactory, SoftDeletes;

    // If you're using a different table name, uncomment and define it:
    protected $table = 'request_helps';

    // Define fillable fields
    protected $fillable = [
        'requester_id',
        'request_number',
        'category',
        'details',
        'quantity',
        'urgent',
        'phone_number',
        'proof',
        'qr_code',
        'latitude_map',
        'longitude_map',
        'full_address',
        'declaration',
        'reason',
        'status',
    ];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function offer()
    {
        return $this->hasMany(OfferHelp::class, 'id', 'request_id');
    }
    
}
