<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderPack extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'count',
        'price',
        'description',
        'provider_id',
        'bonus'
    ];


    public function provider(){
        return $this->belongsTo(Provider::class,'provider_id');
    }
}
