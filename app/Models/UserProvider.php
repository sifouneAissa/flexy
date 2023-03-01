<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProvider extends Model
{
    use HasFactory;

    protected  $fillable = [
        'user_id',
        'provider_id',
        'percentage'
    ];

    protected $appends = [
        'name'
    ];


    public function provider(){
        return $this->belongsTo(Provider::class,'provider_id');
    }

    public function getNameAttribute(){
        return $this->provider->name;
    }
}
