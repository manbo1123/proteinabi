@extends('layout')

@section('content')
  <div class="newpage">
      <div class="d-flex newpage__title">
        <i class="fas fa-pen-alt fa-2x"></i>
        <h1>新しく商品情報を登録</h1>
      </div>

      {{ Form::open(['route' => 'product.store', 'files'=>true]) }}
        <div class='form-group'>
          {{ Form::label('name', '商品名： ') }}
          {{ Form::text('name', null, ['placeholder'=>'商品名を入力']) }}
        </div>

        <div class='form-group'>
          {{ Form::label('category_id', 'カテゴリー： ') }}
          {{ Form::select('category_id', $categories, null, ['placeholder' => '選択してください']) }}
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
          {{ Form::select('condition', $conditions, null, ['placeholder' => '選択してください']) }}
        </div>

        <div class='form-group'>
          {{ Form::label('flavor', 'フレーバー： ') }}
          {{ Form::select('flavor', $flavors, null, ['placeholder' => '選択してください']) }}
        </div>

        <div class='form-group'>
          {{ Form::label('brand_id', 'ブランド： ') }}
          {{ Form::select('brand_id', $brands, null, ['placeholder' => '選択してください']) }}
        </div>

        <div class="d-flex btn_set">
          <div class='form-group px-2'>
            {{ Form::submit('登録', ['class' => 'btn btn-primary']) }}
          </div>

          <div class="px-2">
            <a href='{{ route("product.list") }}' class="btn btn-outline-secondary">もどる</a>
          </div>
        </div>
      {{ Form::close() }}
  </div>
@endsection