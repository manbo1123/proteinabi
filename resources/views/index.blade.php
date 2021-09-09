@extends('layout')

@section('content')
    <div class="d-flex">
        <p>{{ Breadcrumbs::render('home') }}</p>
        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                <a href='{{ route("product.category_show") }}' class="text-dark">
                    <i class="fas fa-list"></i>
                    カテゴリから探す
                </a>
            </button>
            <div class="dropdown-menu">
                @foreach ($categories as $category)
                    <a href='{{ route("product.category_search", ["category"=>$category->id]) }}' class="btn">
                        {{ $category -> name }}
                    </a>
                @endforeach
            </div>
        </div>

        <p class="btn">
            <a href='{{ route("product.brand_show") }}', class="btn">
                <i class="fas fa-tags"></i>
                ブランドから探す
            </a>
        </p>
    </div>

    <div class="indexpage_title">
        <div class="indexpage_title__text">
            <h1>Protein？ BCAA？</h1>
            <p>初心者が失敗しないためにレビューを集めてみた件</p>
        </div>
    </div>

    <div class="d-flex serch">
        <div class="serch__box">
            {{ Form::open(['method' => 'get', 'class'=>'form-serch d-flex']) }}
            {{ csrf_field() }}           <!-- CSRFトークン -->
            <div class='form-group d-flex form-serch__box'>
            <!--{{ Form::label('keyword', 'キーワード：') }}-->
            {{ Form::text('keyword', null, ['class' => 'form-control', 'placeholder'=>'商品名からさがす']) }}
            </div>
            <div class='form-group'>
            {{ Form::button('<i class="fas fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-primary']) }}  <!-- 検索ボタン -->
            <a href='{{ route("product.list") }}', class="btn btn-outline-secondary">クリア</a>                     <!-- indexページへのリンク -->
            </div>
            {{ Form::close() }}    <!-- フォーム終了タグ -->
        </div>

        <div>
            <a href='{{ route("product.new") }}', class="btn btn-outline-warning">商品登録</a>
        </div>
    </div>

    <div class="text-center">
        <h2>人気のカテゴリ</h2>
        <div class="d-flex justify-content-center">
            @foreach ($categories as $category)
                <a href='{{ route("product.category_search", ["category"=>$category->id]) }}' class="btn text-secondary">
                    #{{ $category -> name }}
                </a>
            @endforeach
        </div>
    </div>


    <div class="text-center">
        <h1>LINEUP</h1>
        <p>商品一覧</p>
        <div class="m-3 p-3 product_box">
            @foreach ($products as $product)
                <div class="product_box_part">
                <div class="product_img">
                    <img src="/storage/product_imgs/{{$product->name}}.jpg" height="100">
                </div>

                <div class="product_box__parts">
                    <a href='{{ route("product.show", ["product"=>$product->id]) }}' class="product_name">{{ $product->name }}</a>
                    <!--<p><span>単価：</span>{{ $product -> price }}<span>円/kg</span></p>
                    <p><span>商品情報：</span>{{ nl2br(e(str_limit($product->info, 150))) }}</p>
                    <p><span>含有成分：</span>{{ nl2br(e(str_limit($product -> ingredient, 50))) }}</p>
                    <p><span>形態：</span>{{\App\Enums\Product\Condition::getDescription($product -> condition)}}</p>-->
                    <p>
                        {{ $product -> brand -> name }} / 
                        {{\App\Enums\Product\Flavor::getDescription($product -> flavor)}} / 
                        {{ $product -> category -> name }}
                    </p>

                    <div class="card-footer_box">
                        <span class="mr-2">
                            投稿日 {{ $product->created_at->format('Y.m.d') }}
                        </span>
                        @if ($product->comments->count())
                            <span class="badge badge-primary">
                                レビュー数 {{ $product->comments->count() }}件
                            </span>
                        @endif
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="text-center">
        <h1>New !!</h1>
        <p>新着順</p>
        <div class="m-3 p-3 product_box">
            @foreach ($all_products as $product)
                <div class="product_box_part">
                <div class="product_img">
                    <img src="/storage/product_imgs/{{$product->name}}.jpg" height="100">
                </div>

                <div class="product_box__parts">
                    <a href='{{ route("product.show", ["product"=>$product->id]) }}' class="product_name">{{ $product->name }}</a>
                    <p>
                        {{ $product -> brand -> name }} / 
                        {{\App\Enums\Product\Flavor::getDescription($product -> flavor)}} / 
                        {{ $product -> category -> name }}
                    </p>

                    <div class="card-footer_box">
                        <span class="mr-2">
                            投稿日 {{ $product->created_at->format('Y.m.d') }}
                        </span>
                        @if ($product->comments->count())
                            <span class="badge badge-primary">
                                評価数 {{ $product->comments->count() }}件
                            </span>
                        @endif
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="text-center">
        <h1>Feature</h1>
        <p>ピックアップ記事</p>
        <p>絶賛準備中。。</p>
    </div>

    <div class="text-center">
        <h1>Ranking</h1>
        <p>みんなが気になってる順</p>
        <div class="m-3 p-3 product_box">
            @foreach ($click_products as $product)
                <div class="product_box_part">
                <div class="product_img">
                    <img src="/storage/product_imgs/{{$product->name}}.jpg" height="100">
                </div>

                <div class="product_box__parts">
                    <a href='{{ route("product.show", ["product"=>$product->id]) }}' class="product_name">{{ $product->name }}</a>
                    <p>
                        {{ $product -> brand -> name }} / 
                        {{\App\Enums\Product\Flavor::getDescription($product -> flavor)}} / 
                        {{ $product -> category -> name }}
                    </p>
                    
                    <div class="card-footer_box">
                        <span class="mr-2">
                            投稿日 {{ $product->created_at->format('Y.m.d') }}
                        </span>
                        @if ($product->comments->count())
                            <span class="badge badge-primary">
                                評価数 {{ $product->comments->count() }}件
                            </span>
                        @endif
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection