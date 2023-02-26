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


    public function providers(){
        return $this->belongsToMany(Provider::class,'provider_memberships');
    }


    public function providerMemberships(){
        return $this->hasMany(ProviderMembership::class,'member_ship_id');
    }



    public function cPer($id){
        return $this->providerMemberships()->where("provider_memberships.provider_id",$id)->first();
    }
}
