<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'order'
    ];

    public function memberships(){
        return $this->belongsToMany(MemberShip::class,'member_ship_levels','level_id');
    }
}
