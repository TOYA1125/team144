@extends('layouts.app')
@include('parts.navi')
@section('content')

<!-- バリデーションエラーの表示 -->
@include('common.errors')

<!-- 検索バー追加 -->
<form class="search">
  <div>
    <input type="search" name="search" value="{{request('search')}}" placeholder="キーワード入力">
  </div>
  <input class="search-btn" type="submit" value="検索する">
</form>

<h2 class="title">商品画面</h2>

<div class="merchandise">
  <table class="merchandise-box " border="1" cellspacing="0">
    <tr>
      <th class="number">商品番号</th>
      <th class="name">商品名</th>
      <th class="category">カテゴリー</th>
      <th class="nickname">担当者名</th>
      <th class="register">登録日時</th>
      <th class="update">更新日時</th>
      <th class="space"></th>
    </tr>
    @foreach ($items as $item)
    <tr>
      <td class="number02">{{ $item->id }}</td>
      <td class="name02">{{ $item->name }}</td>
      <td class="category02">{{ App\Models\Item::TYPES[$item->type] ?? '未分類' }}</td>
      @if (isset($item->user->name))
      <td class="nickname02">{{ $item->user->name }}</td>
      @else
      <td class="nickname02"></td>
      @endif
      <td class="register02">{{ $item->created_at }}</td>
      <td class="update02">{{ $item->updated_at }}</td>
      <td class="space">
        <h3><a href="/search/details/{{$item->id}}">>>詳細へ</a></h3>
      </td>
    </tr>
    @endforeach
  </table>
</div>
