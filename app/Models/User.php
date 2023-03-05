<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Questocat\Referral\Traits\UserReferral;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use UserReferral;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lang',
        'mode',
        'referred_by',
        'affiliate_id',
        'level_id',
        'member_ship_id',
        'balance',
        'credit'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function providers(){
        return $this->belongsToMany(Provider::class,'user_providers');
    }

    public function user_providers(){
        return $this->hasMany(UserProvider::class,'user_id');
    }

    public function getReferralLink()
    {
        return route(config("referral.route_root_name")).'/?ref='.$this->affiliate_id;
    }

    public function parent(){
            if(!$this->hasRole('admin') && !$this->referred_by)
                return User::query()->whereHas('roles',fn ($builder) => $builder->where('name','admin'))->first();
            return $this->belongsTo(User::class,'referred_by','affiliate_id');
    }

    public function children(){
        return $this->hasMany(User::class,'referred_by','affiliate_id');
    }

    public function cPer($id){
        if(auth()->user() && $this->hasRole('admin'))
            return Provider::find($id);

        return $this->user_providers()->where("user_providers.provider_id",$id)->first();
    }

    public function membership(){
        return $this->belongsTo(Membership::class,'member_ship_id');
    }
    public function level(){
        return $this->belongsTo(Level::class,'level_id');
    }

    public function mpayments(){
        return $this->hasMany(Payment::class,'seller_id');
    }

    public function dpayments(){
        return $this->hasMany(Payment::class,'buyer_id');
    }

    public function musers(){
        return $this->belongsToMany(User::class,'payments','seller_id');
    }

    public function dusers(){
        return $this->belongsToMany(User::class,'payments','buyer_id');
    }

    public function clients(){
        return $this->hasMany(Client::class,'user_id');
    }

    public function updateCash($amount,$withC=true){

        if(!$this->hasRole('admin'))
        startTransaction(function () use ($amount,$withC){
            $balance = (double) $this->balance;
            $newB  = $balance + $amount;
            $this->balance = $newB;

            if($withC)
            {
                $credit = (double) $this->credit;
                $newC = $credit + $amount;
                $this->credit = $newC;
            }

            $this->save();
        });

    }

    public function checkBalance($amount){
        if($this->hasRole('admin')) return true;
        return (double)$this->balance >= (double) $amount;
    }
}
