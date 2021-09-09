<?php

// ホーム
Breadcrumbs::for('/', function ($trail) {
    $trail->push('HOME', url(''));
});

// ホーム > カテゴリ一覧
Breadcrumbs::for('category', function ($trail) {
  $trail->parent('home');
  $trail->push('カテゴリ一覧', url('category'));
});

// Home > カテゴリ一覧 > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('home');
    $trail->push($category->title, route('category', $category->id));
});
