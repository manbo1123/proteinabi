@extends('layout')

@section('content')
    <div class="text-center">
        <h1>BRAND</h1>
        <p>ブランド一覧</p>
    </div>

    <div class="text-center">
        @for ( $i = 0; $i < 26; $i++ )
          <a href="/brands/{i}" class="btn btn-outline-primary">{{ chr(65 + $i) }}</a>
        @endfor
    </div>

    <div>
        <p>ブランドリスト</p>

        <div>
          @foreach ($brands as $brand)
            <p>{{ $brand -> name }}</p>
          @endforeach
        </div>

    </div>
@endsection