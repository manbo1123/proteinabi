<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Product\Condition;
use App\Enums\Product\Flavor;
class Product extends Model
{
    public function brand() {
        return $this->belongsTo('App\Brand');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function imgs() {
        return $this->hasMany('App\Img');
    }
    
    public function comments() {
        return $this->hasMany('App\Comment', 'product_id', 'id');
    }

    public function requests() {
      return $this->hasMany('App\Request');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }

    // いいね！したユーザーを取得するメソッド
    public function favorite_by() {
      return Favorite::where('user_id', Auth::user()->id)->first();
    }

    // Enumクラスの自動キャスト
    protected $enumCasts = [
        'condition' => Condition::class,
        'flavor' => Flavor::class,
    ];
}
