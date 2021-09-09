<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'comment_id'];

    public function Comment() {
      return $this->belongsTo('App\Comment');
    }

    public function User() {
      return $this->belongsTo(User::class);
    }

    //いいねが既にされてるか？
    public function favorite_exist($id, $product_id) {
        //favoritesテーブルのレコードにユーザーidと投稿idが一致するものを取得
        $exist = Favorite::where('user_id', '=', $id)->where('product_id', '=', $product_id)->get();

        if (!$exist->isEmpty()) {    // レコード（$exist）がある
            return true;
        } else {                    // レコード（$exist）がない
            return false;
        }
    }
}
