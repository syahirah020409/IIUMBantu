<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CollabDonation extends Model
{
    use HasFactory, SoftDeletes;

    // If you're using a different table name, uncomment and define it:
    protected $table = 'collab_donations';

    // Define fillable fields
    protected $fillable = [
        'requester_id',
        'name',
        'description',
        'target_amount',
        'donation_for',
        'poster',
        'background',
        'reason',
        'status',
    ];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

}
