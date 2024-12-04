<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class OfferHelp extends Model
{
    use HasFactory, SoftDeletes;

    // If you're using a different table name, uncomment and define it:
    protected $table = 'offer_helps';

    // Define fillable fields
    protected $fillable = [
        'request_id',
        'helper_id',
        'help_type',
        'quantity',
        'proof',
        'status',
    ];

    public function helper()
    {
        return $this->belongsTo(User::class, 'helper_id');
    }

    public function request()
    {
        return $this->belongsTo(RequestHelp::class, 'request_id');
    }

}
