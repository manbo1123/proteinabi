<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use App\Enums\Product\Condition;
use App\Enums\Product\Flavor;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('keyword')) {            // データの有無で条件分岐
            $keyword = $request->input('keyword');    // $request（フォームで送られたデータ） の中から、「keyword」を取得して、変数に定義
            $message = '検索結果: '.$keyword;          // ビュー表示のため、変数に格納
            $products = Product::where('name', 'like', '%'.$keyword.'%')->get();
          }else{     // 未入力の場合
            $message = "検索キーワードを入力してください。";
            $products = Product::orderBy('created_at', 'desc')->get(); 
          }

          // クリック数が多い順--------------------------------------
          $click_products = Product::select('products.*')   // Productモデルの全レコード取得
          ->join('comments', 'products.id', '=', 'comments.product_id')    // (productsテーブルのid) = (commentsテーブルのproduct_id) を取得
              // クリックカラムの合計値
          ->orderBy('comments.click', 'desc')->get();   // commentsテーブルのclickカラムが多い順で取得

          //---------------------------------------------------------

          $all_products = Product::orderBy('created_at', 'desc')->get();   // 新着順
          $categories = Category::all();
          return view('index', ['message' => $message, 'products' => $products, 'all_products' => $all_products, 'click_products' => $click_products, 'categories'=> $categories]);  // ビューに渡す
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conditions = Condition::toSelectArray();
        $flavors = Flavor::toSelectArray();
        $brands = Brand::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');   //nameとidカラムだけ取得 
        return view('new', compact('conditions', 'flavors'), ['brands'=> $brands, 'categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product -> name = request('name');
        $product -> info = request('info');
        $product -> ingredient = request('ingredient');
        $product -> condition = request('condition');
        $product -> flavor = request('flavor');
        $product -> price = request('price');
        $product -> brand_id = request('brand_id');
        $product -> category_id = request('category_id');
        $product -> save();
        return redirect() -> route('product.show', ['product' => $product->id] );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('show', ['product' => $product] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = '編集： '.$id;    // 表示用
        $product = Product::find($id);  // 編集するレコードをid情報から取得
        $conditions = Condition::toSelectArray();
        $flavors = Flavor::toSelectArray();
        $brands = Brand::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        return view('edit', ['message'=>$message, 'product'=>$product, 'conditions'=> $conditions, 'flavors'=> $flavors, 'brands'=> $brands, 'categories'=> $categories]);  // 編集ページに渡す
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product -> name = request('name');
        $product -> info = request('info');
        $product -> ingredient = request('ingredient');
        $product -> condition = request('condition');
        $product -> flavor = request('flavor');
        $product -> price = request('price');
        $product -> brand_id = request('brand_id');
        $product -> category_id = request('category_id');
        $product -> save();
        return redirect()->route('product.show', ['product' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product -> delete();
        //$post->comments()->delete();
        return redirect("/products");
    }

    // ブランド検索ページ表示
    public function brand_show() {
        $brands = Brand::all()->sortBy('name');
        return view('brand', ['brands' => $brands]);
    }
    
    // ブランド検索
    public function brand_search() {

        return view('/');
    }

    // カテゴリ検索ページ表示
    public function category_show() {
        $categories = Category::all()->sortBy('name');
        return view('category', ['categories' => $categories]);
    }
    
    // カテゴリ検索
    public function category_search($id) {
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->get();
        return view('category_search', ['category' => $category, 'products' => $products] );
    }

}
