<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tid extends Model
{
    use HasFactory;


    // relationship with plans
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
