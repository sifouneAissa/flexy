<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNumber extends Model
{
    use HasFactory;
    protected $fillable = [
          'number',
          'user_id',
          'provider_id',
          'is_personnel'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function provider(){
        return $this->belongsTo(Provider::class,'provider_id');
    }
}
