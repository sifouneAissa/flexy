<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'buyer_id',
        'method_payment_id',
        'amount',
        'status'
    ];

    public function seller(){
        return $this->belongsTo(User::class,'seller_id');
    }

    public function buyer(){
        return $this->belongsTo(User::class,'buyer_id');
    }


}
