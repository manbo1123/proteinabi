@extends('layout')

@section('content')
  <div class="detailpage">
      <h1>{{ $product -> name }}</h1>
      <div class="product_detail d-flex">
          <div class="product_detail__img">
              <img src="/storage/product_imgs/{{$product->name}}.jpg" height="250">
          </div>

          <div class="product_detail__text">
              <p><span>形態：</span>{{\App\Enums\Product\Condition::getDescription($product -> condition)}}</p>
              <p><span>フレーバー：</span>{{\App\Enums\Product\Flavor::getDescription($product -> flavor)}}</p>
              <p><span>単価：</span>{{ $product -> price }}<span>円/kg</span></p>
              <p><span>商品情報：</span>{!! nl2br(e( $product->info )) !!}</p>
              <p><span>含有成分：</span>{{ $product -> ingredient }}</p>
              <p><span>ブランド：</span>{{ $product -> brand -> name }}</p>
              <p><span>カテゴリー：</span>{{ $product -> category -> name }}</p>

              <div class="card-footer_box">  <!-- 投稿日時、評価数 -->
                  <span class="mr-2">投稿日 {{ $product->created_at->format('Y.m.d') }}</span>
                  @if ($product->comments->count())
                      <span class="badge badge-primary">評価数 {{ $product->comments->count() }}件</span>
                  @endif
              </div>
          </div>
      </div>

      <div>   <!-- その商品に対する評価一覧 -->
            <h2>レビュー詳細</h2>
            <div class='d-flex text-warning'>
                @if ($comment->stars == 1)
                    <i class="fas fa-star"></i>
                @elseif ($comment->stars == 2)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                @elseif ($comment->stars == 3)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                @elseif ($comment->stars == 4)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                @elseif ($comment->stars == 5)
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                @endif
            </div>
            <p class="evaluator_info">
                {{ $comment->evaluator->family_name }}
                {{ $comment->evaluator->first_name }}さん/
                {{ $comment->evaluator->belong }}/
                <a href='{{ $comment->evaluator->url }}'>会社URL</a>/
                {{ $comment->created_at->format('Y.m.d') }}投稿
            </p>

            <ul>
                <h3>{{ $comment->title }}</h3>
                <p>{{ $comment->comment }}</p>
                <p>{{ $comment->created_at->format('Y.m.d') }}</p>
            </ul>

            <div class="text-secondary d-flex">
                <!-- ルーティング要修正 -->
                {{ Form::open(['route' => ['favorite.store', "product"=> $product->id, "comment"=> $comment->id]]) }}
                  {{ Form::button('参考になった。ありがとう<i class="far fa-thumbs-up fa-lg ml-1 fa-spin"></i>'.$comment->favorites_count, ['type' => 'submit', 'class'=>"btn btn-outline-primary ml-1"]) }}
                {{ Form::close() }}

                <div class="btn text-secondary ml-1">
                    <i class="fab fa-twitter fa-lg"></i>
                </div>
                <div class="btn text-secondary ml-1">
                    <i class="fab fa-facebook-f fa-lg"></i>
                </div>
                <div class="btn text-secondary ml-1">
                    <i class="fas fa-link fa-lg"></i>
                </div>
                <a href = '{{ route("comment.edit", ["product"=> $product->id, "comment"=> $comment->id]) }}' class="btn btn-outline-success">レビューを編集</a>
            </div>
      </div>
  </div>
@endsection