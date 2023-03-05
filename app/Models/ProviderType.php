<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderType extends Model
{
    use HasFactory;

    protected $fillable = [
            'name',
            'description',
            'icon',
            'order',
            'active'
    ];


    public function providers(){
        return $this->hasMany(Provider::class,'type');
    }


}
