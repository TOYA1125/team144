<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style type='text/css'>
            body {
                font-family: "Helvetica Neue",
                    Arial, 
                    "Hiragino Kaku Gothic ProN",
                    "Hiragino Sans",
                    Meiryo,
                    sans-serif;
            }
        </style>
        <title>商品管理システム画面</title>
    </head>
    <body>
        @include('parts.navi')
        <div class="container">
            <h1 style="font-size:1.25rem;">商品管理システム</h1>
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.js"></script>
    </body>
</html>