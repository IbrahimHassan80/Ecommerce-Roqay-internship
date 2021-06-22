<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Admin\Usernumber;
use App\Models\Admin\category;
use App\Models\Admin\product;
use App\Models\Admin\cart;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use HasFactory, HasRoles;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'mobile',
        'created_at',
        'updated_at',
    ];

    public function mobile(){
        return $this->hasMany(Usernumber::class, 'user_id','id');
    }

    public function product(){
        return $this->belongsToMany(product::class,'carts', 'user_id', 'product_id');
    }

}