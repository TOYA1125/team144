<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ユーザー一覧</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
<body>
@include('parts.navi')

<div class="container">
    <div class="pb-1" style= "text-align:center;">
        <h4>ユーザー一覧</h4>
    </div>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>社員番号</th>
                    <th>名前</th>
                    <th>Email</th>
                    <th>ユーザー種別</th>
                    <th>更新日付</th>
                    <th></th>
                </tr>
            </thead>
            @foreach($user ?? '' as $value)
            <tbody>
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->employeeNumber}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>
                    @if ($value->role == 0)
                        一般
                    @else
                        管理者
                    @endif
                    </td>
                    <td>{{$value->updated_at}}</td>
                    <td><a href="/user/edit/{{$value->id}}"><button type="button" class="btn btn-sm btn-outline-primary" >編集</button></a></td>
                </tr>
            @endforeach  
            </tbody>    
        </table>
        {{ $user->links('pagination::bootstrap-4') }}
    </div>
</div>

</body>
</html>