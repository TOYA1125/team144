<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー情報編集</title>
    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="mt-4" style= "text-align:center;">
        <h4>ユーザー情報編集</h4>
    </div>
    <div class="form-group mt-3 col-sm-6 offset-sm-3">
        <a href="/user"><button type="button" class="btn btn-outline-primary">戻る</button></a>
    </div>
    <form action="/user/update" method="post">
        @csrf
        <input class="form-control" type="text" name="id" value="{{$user->id}}" hidden>
        <div class="form-group mt-3 text-center col-sm-6 offset-sm-3">
            <p class="fw-bold text-end">社員番号：{{$user->employeeNumber}}</p>
        </div>
        <div class="form-group mt-3 pb-3 text-center col-sm-6 offset-sm-3">
            <label>名前</label>
            <input class="form-control" type="text" name="name" value="{{ old('name',$user->name) }}">
            <span style="color:red;">
                @if($errors->has('name'))
			        @foreach($errors->get('name') as $message)
				        {{ $message }}<br>
			        @endforeach
		        @endif 
            </span>
        </div>
        <div class="form-group mt-3 pb-3 text-center col-sm-6 offset-sm-3">
            <label>Email</label>
            <input class="form-control" type="text" name="email" value="{{ old('email',$user->email) }}">
            <span style="color:red;">
                @if($errors->has('email'))
			        @foreach($errors->get('email') as $message)
				        {{ $message }}<br>
			        @endforeach
		        @endif
            </span>
        </div>
        <div class="form-group mt-3 pb-5 text-center col-sm-6 offset-sm-3">
            <p><label>ユーザー種別</label></p>
            <div style="display:inline;">
                <input type="radio" name="role" value="0" <?php echo ($user->role == 0 ? 'checked' : '') ?>>
                <label>一般 &emsp;</lavel>
                <input type="radio" name="role" value="1" <?php echo ($user->role == 1 ? 'checked' : '') ?>>
                <label>管理者</lavel>
            </div>
        </div>
        <div class="d-grid gap-2 col-3 mx-auto">
            <button type="submit" class="btn btn-primary" data-bs-toggle="button" autocomplete="off">更新</button>   
        </div>
    </form>
    <form action="/user/userDelete/{{$user->id}}" method="post">
        <div class="d-grid gap-2 mt-3 col-3 mx-auto">
            @csrf
            <button type="submit" class="btn btn-secondary" data-bs-toggle="button" autocomplete="off">削除</button>
        </div>
    </form>
</div>

</body>
</html>