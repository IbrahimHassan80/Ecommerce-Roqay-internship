<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany(user::class,'carts',  'product_id' ,'user_id');
    }

}
