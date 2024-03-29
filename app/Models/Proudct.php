<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proudct extends Model
{
    use HasFactory;
    protected $fillable=[
        "weight","ingredients","category_id","id","title","desc","price","user_id","image","stock_number"
    ];
    public function category(){
        return $this->belongsTo(Category::class);

    }

    public function user(){
        return $this->belongsTo(User::class);

    }

    public function carts(){
        return $this->hasMany(Cart::class);

    }
}
