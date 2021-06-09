<?php

namespace App\Models\Admin;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;
    
    protected $table = 'admins';
    protected $fillable = ['name', 'email', 'password','created_at', 'updated_at','roles_name','status'];
    protected $casts = [
        'roles_name' => 'array',
    ];

}