<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SNavitem extends Model
{
    use HasFactory;

    protected $fillable  = [
        'name',
        'parent_id',
        'icon',
        'isNew',
        'route',
        'is_active',
        'order',
        'permission',
        'need_login'
    ];

    protected $casts = [
        'need_login' => 'boolean',
        'order' => 'integer'
    ];

    public function children() {
        return $this->hasMany(SNavitem::class,'parent_id','id')->orderBy('order');
    }

    public function parent() {
        return $this->belongsTo(SNavitem::class,'parent_id');
    }

    public function is_nav_item(){
        return $this->parent_id === null;
    }

    public function is_drop_down(){
        return !$this->children->isEmpty();
    }

}
