<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberShip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'order'
    ];



    public function levels(){
        return $this->belongsToMany(Level::class,'member_ship_levels','member_ship_id');
    }
}
