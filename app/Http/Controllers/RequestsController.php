<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requests;
use App\Product;
class RequestsController extends Controller
{
    public function store($id) {
        /*
        if (Auth::user()) {             // userログインしてる時
            $request = new Request();
            $request -> user_id = Auth::user()->id;
            $request -> product_id = request('product_id');
        }*/
        $product = Product::find($id);
        $product -> requests_count ++;
        $product -> save();
        return redirect()->route('product.show', ['product' => $id]);
    }
}
