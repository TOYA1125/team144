<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   

    <title>家電LAB</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
</head>

<body>
@include('parts.navi')

<div class="card-body">
    <ul class="list-group">
        <p class="text-center">新着情報＆ニュース</p>
        <div class="container-fluid">
          <table class="table">
            <tr>
              <th>商品番号</th>
              <th>商品名</th>
              <th>商品種別</th>
              <th>商品価格</th>
              <th>詳細</th>
            </tr>
@foreach($items as $item)
        <tr>
            <td class="col-md-1"><a href="#">{{$item->id}}</a></td>
            <td class="col-md-2">{{$item->name}}</td>
            <td class="col-md-2">{{$types[$item->type]}}</td>
            <td class="col-md-2">{{$item->price}}</td>
            <td class="col-md-4">{{Str::limit($item->datail,20)}}</td>
        </tr>
@endforeach
         </table>

        
      </div>

        <ul class="list-group ">
          <p class="text-center"></p>
            <div class="col-md-3">ニュース</div>
             <div class="container-fluid">
              <div class="row">
                 <div class="col-md-6">サーバメンテナンスに関するお知らせ</div>
              </div>
              <div class="row">
                 <div class="col-md-6">相談窓口および修理対応について</div>
              </div>
            </div>
    </ul>
</div>


<div class="card-group">
   <div class="card border-0">
          <figure class="figure text-center">
               <img src="/image/10563.png">
          </figure>
   </div>
   <div class="card border-0">
          <figure class="figure text-center">
               <img src="/image/13153.png">
          </figure>
   </div>
   <div class="card border-0">
          <figure class="figure text-center">
               <img src="/image/15410.png">
          </figure>
   </div>

</body>

</html