<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container text-center col-xl-3 col-12">
<h1 class="text-danger">家電LAB</h1>
<br>
    <h5><strong>ログイン</strong></h5>
        <!--エラー表示 社員IDまたはパスワードの不一致-->
        @if($errors->has('message'))
      <span class="text-danger">{{ $errors->first('message') }}</span>
      @endif
  <div class="container-fluid">
    <form method="post" action="{{ url('/account/auth') }}">
      @csrf
        <div class="form-group">
          <input type="employeeNumber" name="employeeNumber" class="form-control mt-2" placeholder="社員ID" value="{{old('employeeNumber')}}">
        </div>
        <!--エラー表示 フォームが空-->
        @if ($errors->has('employeeNumber'))
        <span class="text-danger">{{ $errors->first('employeeNumber') }}</span>
        @endif
        <div class="form-group">
          <input type="password" name="password" class="form-control mt-2" placeholder="パスワード" value="{{old('password')}}">
        </div>
        <!--エラー表示 フォームが空-->
        @if ($errors->has('password'))
        <span class="text-danger"> {{ $errors->first('password') }}</span>
        @endif
<br>
        <button type="submit" class="btn btn-primary mt-2">ログイン</button>

      <p class="">初めてご利用ですか？<a href="/account/register">新規登録はこちら</a></p>
    </form>
  </div>
</div>
</body>