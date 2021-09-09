<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Favorite;
use App\Comment;
use App\Product;
class FavoritesController extends Controller
{
    public function store($productId, $commentId) {
        /*
        if (Auth::user()) {             // userログインしてる時
            $favorite = new Favorite();
            $favorite -> user_id = Auth::user()->id;
            $favorite -> comment_id = request('comment_id');
        }*/
        $comment = Comment::find($commentId);
        $comment -> favorites_count ++;
        $comment -> save();
        return redirect()->route('product.show', ['product' => $productId]);
    }


    /* いいね！の削除
    public function destroy($productId, $favoriteId) {
        $product = Product::findOrFail($productId);
        $product->like_by()->findOrFail($favoriteId)->delete();
        return redirect()->action('ProductsController@show', $product->id);
    }
    */
}
