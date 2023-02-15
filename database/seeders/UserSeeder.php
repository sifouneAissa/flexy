<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function create($models,$builder = User::class){

        return array_map(function ($model) use ($builder){

            if($user = $builder::where('email',$model['email'])->first())
                return $user;
            else
                return $builder::create($model);

        },$models);
    }

    public function assignPermissions($permissions,$roles){

        foreach($permissions as $permission){
            $cPermission =  Permission::findOrCreate($permission);

            array_map(function ($role) use ($cPermission){
                $role->givePermissionTo($cPermission);
            },$roles);
        }
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $croles = config('default.roles');

        $roles = array_map(function ($role){
            return Role::findOrCreate($role);
        },array_keys($croles));

        $all = config('default.permissions.all');


        $models = $this->create(config('default.users'));

        // assign roles
        foreach ($roles as $role){
            $emails = $croles[$role->name];
            array_map(function ($model) use ($emails,$role){
                if(in_array($model->email,$emails)) $model->assignRole($role);
            },$models);
        }

        // assign permission to all roles
        $this->assignPermissions($all,$roles);
        // assign permission by roles
        foreach($roles as $role){

            $permissions = config('default.permissions.'.$role->name);

            if($permissions) $this->assignPermissions($permissions,[$role]);

        }
    }
}
