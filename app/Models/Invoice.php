<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_number',
        'date',
        'client_name',
        'client_email',
        'total_amount',
        'due_date',
        'status',
        'car_id',
];
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

}
