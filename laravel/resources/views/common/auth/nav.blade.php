<nav class="navbar navbar-expand-lg navbar-header navber-white">
    <div class="container">
        <a href="/admin/home"><img src="{{ asset('images/top/logo.png') }}" class="nav-logo"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto nav-flex">
                <li class="nav-item active">
                    <a class="nav-link" href="/admin/home">トップ</a>
                </li>

                @include('common.nav_item')

                @if(Auth::guard('admin')->check())
                    <li class="nav-item active">
                        <a class="nav-link" href="/shares/create">投稿する</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">管理者ページ</a>

                        <div class="nav-item dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <button form="logout-button" class="dropdown-item">ログアウト</button>
                        </div>
                        <form id="logout-button" method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.register') }}">新規登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">ログイン</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
