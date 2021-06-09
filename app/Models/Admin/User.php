<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Admin\Usernumber;
class User extends Model
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
        return $this->hasMany(Usernumber::class);
    }
}