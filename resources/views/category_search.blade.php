
@extends('layout')

@section('content')
    <h1>{{ $category-> name }}</h1>  
    <p>カテゴリ一覧</p>

    <div class="m-3 p-3 product_box">
        @foreach ($products as $product)
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
        @endforeach
    </div>

@endsection