@extends('app')

@section('title', 'ユーザー登録画面')

@section('content')

    @include('common/nav')

    <div class="shares-content">
        <div class="container">
            <div class="card">
                <div class="card-header users-header">会員登録</div>

                <div class="card-body user-border">
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf
                        <table class="table table-borderless">
                            <tbody>
                            <tr class="user-tr d-flex align-items-center">
                                <div class="row col-md-12">
                                    <th class="user-border-right col-md-3">ユーザー名</th>
                                    <td class="col-md-9 user-input">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        @enderror
                                    </td>
                                </div>
                            </tr>
                            <tr class="user-tr d-flex align-items-center">
                                <div class="row col-md-12">
                                    <th class="user-border-right col-md-3">メールアドレス</th>
                                    <td class="col-md-9 user-input">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </div>
                            </tr>
                            <tr class="user-tr d-flex align-items-center">
                                <div class="row col-md-12">
                                    <th class="user-border-right col-md-3">パスワード</th>
                                    <td class="col-md-9 user-input">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </div>
                            </tr>
                            <tr class="user-tr d-flex align-items-center">
                                <div class="row col-md-12">
                                    <th class="user-border-right col-md-3">パスワード確認</th>
                                    <td class="col-md-9 user-input">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </div>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <button class="btn btn-block blue-gradient p-3 mt-3 col-md-6" type="submit">新規会員登録</button>
                                <a href="#" class="btn btn-default btn-block p-3 mt-3 col-md-6">
                                    ログインはこちら
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('common/footer')

@endsection
