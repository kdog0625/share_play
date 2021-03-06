@extends('app')

@section('title', 'ユーザー登録画面')

@section('content')

    @include('common.users.nav')

    <div class="shares-content">
        <div class="container">
            <div class="card">
                <div class="card-header users-header">会員登録</div>

                <div class="card-body user-border">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <table class="table table-borderless">
                            <tbody>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3">ユーザー名</th>
                                <td class="col-md-9 user-input">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" placeholder="ユーザー名" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3">ユーザーID</th>
                                <td class="col-md-9 user-input">
                                    <input id="share_user_id" type="text" class="form-control @error('share_user_id') is-invalid @enderror" name="share_user_id" value="{{ old('share_user_id') }}"  autocomplete="share_user_id" placeholder="ユーザーID" autofocus>
                                    <small>@+半角英数字の20文字以内で入力して下さい。</small>
                                    @error('share_user_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3">メールアドレス</th>
                                <td class="col-md-9 user-input">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="メールアドレス"  autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3 col-sm-12">氏名</th>
                                <td class="col-md-9 user-input col-sm-12">
                                    <input id="name_kanji1" type="text" class="form-control mb-2 @error('name_kanji1') is-invalid @enderror" name="name_kanji1" value="{{ old('name_kanji1') }}"  autocomplete="name_kanji1" placeholder="氏名(性)">
                                    @error('name_kanji1')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input id="name_kanji2" type="text" class="form-control @error('name_kanji2') is-invalid @enderror" name="name_kanji2" value="{{ old('name_kanji2') }}"  autocomplete="name_kanji2" placeholder="氏名(名)">
                                    @error('name_kanji2')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3">フリガナ</th>
                                <td class="col-md-9 user-input">
                                    <input id="name_kana1" type="text" class="form-control mb-2 @error('name_kana1') is-invalid @enderror" name="name_kana1" value="{{ old('name_kana1') }}"  autocomplete="name_kana1" placeholder="フリガナ(セイ)">
                                    @error('name_kana1')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input id="name_kana2" type="text" class="form-control @error('name_kana2') is-invalid @enderror" name="name_kana2" value="{{ old('name_kana2') }}"  autocomplete="name_kana2" placeholder="フリガナ(メイ)">
                                    @error('name_kana2')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3">生年月日</th>
                                <td class="col-md-9 user-input">
                                    <input id="birth_day" type="text" class="form-control @error('birth_day') is-invalid @enderror" name="birth_day" value="{{ old('birth_day') }}"  autocomplete="birth_day" placeholder="生年月日">
                                    @error('birth_day')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3">年齢</th>
                                <td class="col-md-9 user-input">
                                    <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}"  autocomplete="age" placeholder="年齢">
                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3">性別</th>
                                <td class="col-md-9 user-input">
                                    <input id="sex" type="text" class="form-control @error('sex') is-invalid @enderror" name="sex" value="{{ old('sex') }}"  autocomplete="sex" placeholder="性別">
                                    @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3">在住地域</th>
                                <td class="col-md-9 user-input">
                                    <input id="area_country" type="text" class="form-control @error('area_country') is-invalid @enderror" name="area_country" value="{{ old('area_country') }}"  autocomplete="area_country" placeholder="在住地域">
                                    @error('area_country')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3">都道府県名</th>
                                <td class="col-md-9 user-input">
                                    <input id="prefecture_name" type="text" class="form-control @error('prefecture_name') is-invalid @enderror" name="prefecture_name" value="{{ old('prefecture_name') }}"  autocomplete="prefecture_name" placeholder="都道府県名">
                                    @error('prefecture_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3">電話番号</th>
                                <td class="col-md-9 user-input">
                                    <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}"  autocomplete="tel" placeholder="電話番号">
                                    @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3">パスワード</th>
                                <td class="col-md-9 user-input">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="パスワード"  autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="user-tr d-flex row col-md-12 align-items-center">
                                <th class="user-border-right col-md-3">パスワード確認</th>
                                <td class="col-md-9 user-input">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="パスワード確認"  autocomplete="new-password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group row mb-3">
                            <div class="col-md-12 d-flex align-items-center">
                                <button class="btn btn-block reg-color text-white p-3 mt-3 col-md-5" type="submit">新規会員登録</button>
                                <a href="{{ route('admin.login') }}" class="btn btn-default login-color text-white btn-block p-3 mt-3 ml-auto col-md-5">
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
