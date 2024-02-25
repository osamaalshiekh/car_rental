<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    protected $fillable = [
        'car_id',
        'start_date',
        'end_date',
        'status'

        // Add other attributes as needed
    ];
}
