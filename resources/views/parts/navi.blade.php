<h1 class="text-danger">家電LAB<span class="h6 text-secondary">「ちょうどいい」くらしに寄り添う製品・サービス</span></h1>



 <nav class="navbar navbar-expand-sm navbar-dark bg-primary mt-3 mb-3">
       <div class="collapse navbar-collapse">
           <ul class="navbar-nav">
                <li class="nav-item">        
                    <a class="nav-link" href="/home">ホーム</a>
                </li> 
                <li class="nav-item">        
                    <a class="nav-link" href="/search">商品一覧</a>
                </li> 
                @can('isAdmin')
                <li class="nav-item">        
                    <a class="nav-link" href="/item">商品管理</a>
                </li>        
                <li class="nav-item">
                    <a class="nav-link" href="/user">ユーザー管理</a>
                </li>
                @endcan
            </ul>
        </div>
        <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/logout">ログアウト</a>
                </li>
         </ul>
    </nav> 