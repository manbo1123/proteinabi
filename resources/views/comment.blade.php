@extends('layout')

@section('content')
  <div class="commentpage">
      <h1>レビューの投稿</h1>
      <div class="commentpage__content d-flex">
          <div class="product_info" style="width:45%;height:500px;overflow:auto;">
              <h4>{{ $product -> name }}</h4>

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
          </div>

          <div class="comment_form">
              {{ Form::open(['route' => ['comment.store', $product->id]]) }}
                <input name="product_id" type="hidden" value="{{ $product->id }}">

                <div class='form-group'>
                  {{ Form::label('title', 'タイトル： ') }}
                  {{ Form::text('title', null, ['class'=>'review_title_box', 'placeholder'=>'レビュータイトル']) }}
                </div>

                <div class='form-group'>
                  {{ Form::label('comment', '評価詳細： ') }}
                  {{ Form::textarea('comment', null, ['placeholder' => 'レビューコメントの詳細を記入してください']) }}
                </div>

                <div class='form-group'>
                  {{ Form::label('stars', '利用にあたり総合点をつけて下さい。 ') }}
                  <div class='d-flex text-warning'>
                      {{ Form::radio('stars', '1') }}
                      <div>
                        <i class="fas fa-star fa-2x"></i>
                      </div>
                  </div>

                  <div class='d-flex text-warning'>
                      {{ Form::radio('stars', '2') }}
                      <div>
                        <i class="fas fa-star fa-2x"></i>
                        <i class="fas fa-star fa-2x"></i>
                      </div>
                  </div>
                  <div class='d-flex text-warning'>
                      {{ Form::radio('stars', '3') }}
                      <div>
                        <i class="fas fa-star fa-2x"></i>
                        <i class="fas fa-star fa-2x"></i>
                        <i class="fas fa-star fa-2x"></i>
                      </div>
                  </div>
                  <div class='d-flex text-warning'>
                      {{ Form::radio('stars', '4') }}
                      <div>
                        <i class="fas fa-star fa-2x"></i>
                        <i class="fas fa-star fa-2x"></i>
                        <i class="fas fa-star fa-2x"></i>
                        <i class="fas fa-star fa-2x"></i>
                      </div>
                  </div>
                  <div class='d-flex text-warning'>
                      {{ Form::radio('stars', '5') }}
                      <div>
                        <i class="fas fa-star fa-2x"></i>
                        <i class="fas fa-star fa-2x"></i>
                        <i class="fas fa-star fa-2x"></i>
                        <i class="fas fa-star fa-2x"></i>
                        <i class="fas fa-star fa-2x"></i>
                      </div>
                  </div>
                </div>

                <div class="d-flex text-warning">
                  <div class='form-group px-2'>
                    {{ Form::submit('登録', ['class' => 'btn btn-primary']) }}
                  </div>

                  <div class="px-2">
                    <a href='{{ route("product.list") }}' class="btn btn-outline-secondary">もどる</a>
                  </div>
                </div>
              {{ Form::close() }}
          </div>
      </div>
  </div>
@endsection