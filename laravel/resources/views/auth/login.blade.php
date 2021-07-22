@extends('app')

@section('title', 'ユーザーログイン画面')

@section('content')

    @include('common.users.nav')

    <div class="shares-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <div class="card login-padding">
                        <div class="card-header users-header text-center">ログイン</div>

                        <div class="card-body user-border">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="md-form">
                                    <label for="email">メールアドレス</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <label for="password">パスワード</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group row mb-3 align-items-center">
                                    <div class="password-login">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                パスワードを忘れた場合
                                            </a>
                                        @endif
                                    </div>
                                    <div class="form-check ml-auto login-rm">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            ログイン状態を保持する
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-block login-color text-white p-3 mt-3" type="submit">ログイン</button>

                                <a href="#" class="btn btn-default btn-block text-white p-3 mt-3">
                                    かんたんログインはこちら
                                </a>
                            </form>
                        </div>
                    </div>
                    <a href="{{ route('register') }}" class="btn btn-default btn-block reg-color text-white p-3 mt-5">
                        一般の方のアカウント作成はこちら
                    </a>

                    <a href="{{ route('admin.login') }}" class="btn btn-default btn-block text-white p-3 mt-3">
                       管理者のログインはこちら
                    </a>

                    <a href="#" class="btn btn-block p-3 mt-3 user-share-bg">
                        share playとは
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('common/footer')

@endsection
