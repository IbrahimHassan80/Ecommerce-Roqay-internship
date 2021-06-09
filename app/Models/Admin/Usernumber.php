<?php

namespace App\Models\admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usernumber extends Model
{
    use HasFactory;

    protected $table = 'usersnumber';
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
