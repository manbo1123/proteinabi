@extends('layout')

@section('content')
    <div class="text-center">
        <h1>CATEGORY</h1>  
        <p>カテゴリ一覧</p>
        <div class="d-flex justify-content-center">
            @foreach ($categories as $category)
                <a href='{{ route("product.category_search", ["category"=>$category->id]) }}' class="btn text-secondary">
                    #{{ $category -> name }}
                </a>
            @endforeach
        </div>
    </div>

    <div>
        <ul class="list-unstyled">
            <!-- <li><a href="/category" class="btn"><h4>すべて</h4></a></li> -->
            @foreach ($categories as $category)
                <li>
                    <a href='{{ route("product.category_search", ["category"=>$category->id]) }}' class="btn"><h4>{{ $category -> name }}</h4></a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection