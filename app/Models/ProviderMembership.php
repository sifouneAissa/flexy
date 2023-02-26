<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderMembership extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_ship_id',
        'provider_id',
        'percentage'
    ];
}
