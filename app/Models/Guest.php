<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
