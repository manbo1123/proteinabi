<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $fillable = ['user_id', 'product_id'];

    public function Product() {
      return $this->belongsTo('App\Product');
    }

    public function User() {
      return $this->belongsTo(User::class);
    }
}
