<?php

namespace App;

use App\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    
    public function permissions () {
        return $this->belongsToMany(Permission::class,'permission_roles','role_id','permission_id');
    }
}