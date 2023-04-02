@extends('item.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:20px">商品管理一覧</h2>
            </div>
            <div align="right" class="example-r">
                <a href="{{ route('item.create') }}" class="btn btn-success mb-2 mt-2">商品登録</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr style="text-align: center" class="bg-info text-light">
            <th style="font-size:23px">id</th>
            <th style="font-size:23px">商品名</th>
            <th style="font-size:23px">種別</th>
            <th style="font-size:23px">価格</th>
            <th style="font-size:23px">更新日</th>
            <th style="font-size:23px">変更</th>
        </tr>
        @foreach ($items as $item)
        <tr @if ($item->status!='active') class="bg-secondary"@endif>
            <td style="text-align: center">{{ $item->id }}</td>
            <td style="text-align: center">{{ $item->name }}</td>
            <td style="text-align: center">{{ $types[$item->type] }}</td>
            <td style="text-align: right">{{ number_format($item->price) }}円</td>
            <td style="text-align: right">{{ $item->updated_at  }}</td>
            <td style="text-align:center">
                <a class="btn btn-primary" href="{{ route('item.edit',$item->id) }}">変更</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $items->links('pagination::bootstrap-4') }}
    @if (count($items) >0)
  <p>全<span style="color:red">{{ $items->total() }}</span>件中 
       {{  ($items->currentPage() -1) * $items->perPage() + 1}} - 
       {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件のデータが表示されています。</p>
@else
<p>データがありません。</p>
@endif 
@endsection

