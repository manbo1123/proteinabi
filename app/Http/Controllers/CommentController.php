<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Category;
use App\Comment;
use App\Enums\Product\Condition;
use App\Enums\Product\Flavor;
class CommentController extends Controller
{
    public function create($id) {
        $product = Product::find($id);
        return view('comment', ['product' => $product]);
    }
    
    public function store(Request $request, $productId) {
        $comment = new Comment();
        $comment -> title = request('title');
        $comment -> comment = request('comment');
        $comment -> stars = request('stars');
        $comment -> product_id = request('product_id');
        $comment -> evaluator_id = '1';

        $product = Product::findOrFail($productId);
        $product->comments()->save($comment);
        return redirect()->route('product.show', ['product' => $product->id]);
    }

    public function show($productId, $commentId) {
        $product = Product::find($productId);
        $comment = Comment::find($commentId);
        
        $comment -> click ++;
        $comment -> save();
        return view('detail', ['product' => $product, 'comment' => $comment] );
    }

    public function edit($productId, $commentId)  {
        $product = Product::find($productId);  // 編集するレコードをid情報から取得
        $conditions = Condition::toSelectArray();
        $flavors = Flavor::toSelectArray();
        $brands = Brand::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $comment = Comment::find($commentId);
        return view('comment_edit', ['product'=>$product, 'comment' => $comment, 'conditions'=> $conditions, 'flavors'=> $flavors, 'brands'=> $brands, 'categories'=> $categories]);  // 編集ページに渡す
    }
    
    public function update(Request $request, $productId, $commentId) {
        $comment = Comment::find($commentId);
        $comment -> title = request('title');
        $comment -> comment = request('comment');
        $comment -> stars = request('stars');
        $comment -> product_id = request('product_id');
        $comment -> evaluator_id = '1';
        $comment -> save();
        $product = Product::findOrFail($productId);
        $product->comments()->save($comment);
        return redirect()->route('product.show', ['product' => $product->id]);
    }
}