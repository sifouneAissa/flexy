<?php

namespace App\Models;

use App\Traits\ActivityLogTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class UserNumber extends Model
{
    use HasFactory;
    use LogsActivity;
    use ActivityLogTrait;


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
