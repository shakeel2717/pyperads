<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'type',
        'name',
        'title',
        'number',
        'r_number',
    ];


    // relationship with plans
    public function wallet()
    {
        return $this->belongsTo(wallet::class);
    }
}
