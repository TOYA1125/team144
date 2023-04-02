@extends('layouts.app')

@section('content')

<!-- バリデーションエラーの表示 -->
@include('common.errors')

<div class="back">
  <a href="/search"><button>戻る</button></a>
</div>

<h2 class="title">詳細画面</h2>

<div class="detail">
  <table class="detail-box " border="1">
    <tr>
      <th class="number">商品番号</th>
      <td class="number02">{{ $item->id }}</td>
    </tr>
    <tr>
      <th class="name">商品名</th>
      <td class="name02">{{ $item->name }}</td>
    </tr>
    <tr>
      <th class="category">カテゴリー</th>
      <td class="category02">{{ App\Models\Item::TYPES[$item->type] ?? '未分類' }}</td>
    </tr>
    <tr>
      <th class="price">価格</th>
      <td class="price02">{{ $item->price }}円</td>
    </tr>
    <tr>
      <th class="detail">詳細</th>
      <td class="detail02">{!! nl2br(e( $item->datail)) !!}</td>
    </tr>
    <tr>
      <th class="nickname">担当者名</th>
      <td class="nickname02">{{ $item->nickname }}</td>
    </tr>
    <tr>
      <th class="register">登録日時</th>
      <td class="register02">{{ $item->created_at }}</td>
    </tr>
    <tr>
      <th class="update">更新日時</th>
      <td class="update02">{{ $item->updated_at }}</td>
    </tr>
  </table>
</div>
