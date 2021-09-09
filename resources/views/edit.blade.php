@extends('layout')

@section('content')
  <h1>商品情報を編集</h1>
  <!--<p>{{ $message }}</p>-->
  {{ Form::model($product, ['method' => 'put', 'route' => ['product.update', $product->id, 'files'=>true]]) }}

    <div class='form-group'>
      {{ Form::label('name', '商品名： ') }}
      {{ Form::text('name', null, ['placeholder'=>'商品名を入力']) }}
    </div>

    <div class='form-group'>
      {{ Form::label('category_id', 'カテゴリー： ') }}
      {{ Form::select('category_id', $categories) }}
    </div>

    <div class='form-group'>
      {{ Form::label('info', '商品情報： ') }}
      {{ Form::textarea('info', null, ['placeholder'=>'商品情報を入力']) }}
    </div>

    <div class='form-group'>
      {{ Form::label('ingredient', '含有成分： ') }}
      {{ Form::textarea('ingredient', null, ['placeholder'=>'成分を入力']) }}
    </div>

    <div class='form-group'>
      {{ Form::label('price', '価格： ') }}
      {{ Form::text('price', null, ['placeholder'=>'半角数字']) }}
      <spna>円/kg</spna>
    </div>

    <div class='form-group'>
      {{ Form::label('condition', '状態： ') }}
      {{ Form::select('condition', $conditions) }}
    </div>

    <div class='form-group'>
      {{ Form::label('flavor', 'フレーバー： ') }}
      {{ Form::select('flavor', $flavors) }}
    </div>

    <div class='form-group'>
      {{ Form::label('brand_id', 'ブランド： ') }}
      {{ Form::select('brand_id', $brands) }}
    </div>


    <div class="form-group">
      {{ Form::submit('更新', ['class' => 'btn btn-primary']) }}
      <a href='{{ route("product.show", ["product" =>  $product->id]) }}'>もどる</a>
    </div>
  {{ Form::close() }}
@endsection