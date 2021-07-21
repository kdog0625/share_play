<nav class="navbar navbar-expand-lg navbar-header navber-white">
    <div class="container">
        <a href="/"><img src="{{ asset('images/top/logo.png') }}" class="nav-logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto nav-flex">
                @include('common.nav_item')

                @if(Auth::guard('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link" href="#">管理者ページ</a>
                    </li>
                    <li class="nav-item">
                        <button form="logout-button" class="nav-link">ログアウト</button>
                    </li>
                    <form id="logout-button" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
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
