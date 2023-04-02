<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>ユーザー登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container text-center">
  <h1 class="text-danger">家電LAB</h1><br>
            <h5><strong>ユーザー登録</strong></h5>
        <div class="container text-center">
            <form method="post" action="{{ url('/account/register') }}">
                @csrf
                <div class="form-group d-flex justify-content-center">
                    <table>
                        <tr>
                            <td>氏名</td>
                            <td><input type="text" maxlength="20" name="name" value="{{ old('name') }}" class="form-control mt-2" placeholder="例）山田花子"></td>
                        </tr>
                        {{--エラー表示--}} 
                        <tr>
                            <td>
                            </td>
                            <td>
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>社員ID</td>
                            <td><input type="text" maxlength="5" name="employeeNumber" value="{{ old('employeeNumber') }}"  class="form-control mt-2" placeholder="例）A001"></td>
                        </tr>
                        {{--エラー表示--}} 
                        <tr>
                            <td>
                            </td>
                            <td>
                                @if ($errors->has('employeeNumber'))
                                    @foreach ($errors->get('employeeNumber') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>メール</td>
                            <td><input type="email" name="email" value="{{ old('email') }}"  class="form-control mt-2" placeholder="例）hanako@mail.com"></td>
                        </tr>
                        {{--エラー表示--}} 
                        <tr>
                            <td>
                            </td>
                            <td>
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>パスワード</td>
                            <td><input type="password" name="password" class="form-control mt-2" placeholder="4文字以上"></td>
                        </tr>
                        {{--エラー表示--}} 
                        <tr>
                            <td>
                            </td>
                            <td>
                                @if ($errors->has('password'))
                                    @foreach ($errors->get('password') as $error)
                                        <span class="text-danger  d-block">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>パスワード</td>
                            <td><input type="password" name="password_confirmation" class="form-control mt-2" placeholder="確認用"></td>
                        </tr>
                    </table>
                    </div>
                    <button type="submit" formaction="{{ url('/account/register') }}" class="btn btn-primary mt-2">登録</button>
                    <p class=""><a href="/">ログイン画面に戻る</a></p>
            </form>
        </div>
</body>