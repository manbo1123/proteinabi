@extends('layout')

@section('content')
  <div class="showpage">
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

    <div class="request_box">
        {{ Form::open(['route' => ['request.store', "product"=> $product->id]]) }}
            {{ Form::button('<i class="fas fa-file-alt fa-lg"></i> レビューをリクエストしよう！！（'.$product->requests_count.'）', ['type' => 'submit', 'class'=>"btn btn-primary request_box__btn"]) }}
        {{ Form::close() }}
    </div>

    <div class="review_list">   <!-- その商品に対する評価一覧 -->
        <h2>レビュー一覧</h2>

        <div>
          @forelse ($product->comments as $comment)
            <div class="d-flex text-muted review_list__box">
              <div>
                <i class="fas fa-user-circle fa-3x"></i>
              </div>
            
              <div class="comment_box">
                  <h3>{{ $comment->title }}</h3>

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
                    {{ $comment->evaluator->first_name }}/
                    {{ $comment->evaluator->belong }}/
                    <a href='{{ $comment->evaluator->url }}'>会社URL</a>/
                    {{ $comment->created_at->format('Y.m.d') }}投稿
                  </p>
                  <p>{!! nl2br(e(str_limit($comment->comment, 50))) !!}
                      <a href=' {{ route("comment.show", ["product"=>$product->id, "comment"=> $comment->id]) }}'>もっと見る</a>
                  </p>
                  <div class="text-secondary d-flex">
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
          @empty
            <p>まだレビューがありません。レビューを依頼しましょう！！</p>
          @endforelse
        </div>
    </div>

    <div class="d-flex">  <!-- 編集、戻る、削除ボタン -->
      <a href='{{ route("product.edit", ["product"=> $product->id]) }}' class="btn btn-warning">編集</a>
      <a href = '{{ route("product.list") }}' class="btn btn-outline-warning">もどる</a>

      <div>
        {{ Form::open(['method' => 'delete', 'route' => ['product.destroy', $product -> id]]) }}
          {{ form::submit("削除", ['class' => 'btn btn-outline-warning']) }}
        {{ Form::close() }}
      </div>

      <div>
        <a href = '{{ route("comment.new", ["product"=> $product->id]) }}' class="btn btn-outline-success">レビューする</a>
      </div>
    </div>
  </div>
@endsection