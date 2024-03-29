@extends('item.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size: 1rem;">商品内容変更画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/item') }}">戻る</a>
        </div>
    </div>
</div>

<div style="text-align: left;">
    <form action="{{ route('item.update',$item->id) }}" method="POST">
    @method('PUT')
    @csrf

        <div class="row">
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="name" value="{{ $item->name }}" class="form-control" placeholder="商品名">
                    @error('name')
                        <span style="color:red;">商品名を入力してください</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <select name="type" class="form-select">
                        <option>分類を選択してください</option>
                        @foreach ($types as $key => $value )
                            <option value="{{ $key }}" @if($key==$item->type) selected @endif>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('type')
                    <span style="color:red;">分類を選択してください</span>
                     @enderror
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="price" value="{{ $item->price }}" class="form-control" placeholder="価格">
                    @error('price')
                    <span style="color:red;">価格を数値で入力してください</span>
                     @enderror
                </div>
            </div>
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <textarea name="datail" class="form-control" style="height: 100px" placeholder="詳細">{{ $item->datail }}</textarea>
                    @error('datail')
                    <span style="color:red;">詳細を500文字以内で入力してください</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 mb-2 mt-2">

            </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="active" @if($item->status=="active") checked @endif>
                    <label class="form-check-label" for="inlineRadio1">有効</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="no" @if($item->status!="active") checked @endif>
                    <label class="form-check-label" for="inlineRadio2" >無効</label>
                </div>
                <div class="col-12 mb-2 mt-2">
                    <button type="submit" class="btn btn-primary w-100">更新</button>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('item.destroy', $item->id) }}" method="POST">
        <div style="text-align: center">
            @csrf
            @method('DELETE')
        <button type="submit" class="btn btn-primary btn-danger" onclick='return confirm("削除しますか?")'>削除</button>
    </div>
    </form>
</div>
@endsection
