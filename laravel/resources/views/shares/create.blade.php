@extends('app')

@section('title', 'share play トップページ')

@section('content')

    @include('common.auth.nav')

    <div class="shares-content">
        <div class="container">
            <div class="shares-create" enctype="multipart/form-data">
                <form method="POST" action="{{ route('shares.store') }}" class="shares-create-form">
                    @csrf
                    <dl class="shares-create-list">
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">シェアハウス名</dt>
                            <dd class="shares-create-item-input">
                                <input id="shara_name" class="js-require @error('shara_name') is-invalid @enderror" type="text" name="shara_name" value="{{ old('shara_name') }}"  placeholder="シェアハウス名">
                                @error('shara_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item form-group">
                            <dt><label for="exampleFormControlSelect1" class="shares-create-item-title">都道府県名</label></dt>
                            <dd><select class="select-form shares-create-item-input share-select form-control" name="prefecture_name" id="exampleFormControlSelect1">
                                    <option value="-" selected>選択してください</option>
                                    <option value="北海道">北海道</option>
                                    <option value="青森県">青森県</option>
                                    <option value="岩手県">岩手県</option>
                                    <option value="宮城県">宮城県</option>
                                    <option value="秋田県">秋田県</option>
                                    <option value="山形県">山形県</option>
                                    <option value="福島県">福島県</option>
                                    <option value="茨城県">茨城県</option>
                                    <option value="栃木県">栃木県</option>
                                    <option value="群馬県">群馬県</option>
                                    <option value="埼玉県">埼玉県</option>
                                    <option value="千葉県">千葉県</option>
                                    <option value="東京都">東京都</option>
                                    <option value="神奈川県">神奈川県</option>
                                    <option value="新潟県">新潟県</option>
                                    <option value="富山県">富山県</option>
                                    <option value="石川県">石川県</option>
                                    <option value="福井県">福井県</option>
                                    <option value="山梨県">山梨県</option>
                                    <option value="長野県">長野県</option>
                                    <option value="岐阜県">岐阜県</option>
                                    <option value="静岡県">静岡県</option>
                                    <option value="愛知県">愛知県</option>
                                    <option value="三重県">三重県</option>
                                    <option value="滋賀県">滋賀県</option>
                                    <option value="京都府">京都府</option>
                                    <option value="大阪府">大阪府</option>
                                    <option value="兵庫県">兵庫県</option>
                                    <option value="奈良県">奈良県</option>
                                    <option value="和歌山県">和歌山県</option>
                                    <option value="鳥取県">鳥取県</option>
                                    <option value="島根県">島根県</option>
                                    <option value="岡山県">岡山県</option>
                                    <option value="広島県">広島県</option>
                                    <option value="山口県">山口県</option>
                                    <option value="徳島県">徳島県</option>
                                    <option value="香川県">香川県</option>
                                    <option value="愛媛県">愛媛県</option>
                                    <option value="高知県">高知県</option>
                                    <option value="福岡県">福岡県</option>
                                    <option value="佐賀県">佐賀県</option>
                                    <option value="長崎県">長崎県</option>
                                    <option value="熊本県">熊本県</option>
                                    <option value="大分県">大分県</option>
                                    <option value="宮崎県">宮崎県</option>
                                    <option value="沖縄県">沖縄県</option>
                            </select>
                                @error('prefecture_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">市区町村</dt>
                            <dd class="shares-create-item-input">
                                <input id="municipality_name" class="js-require @error('municipality_name') is-invalid @enderror" type="text" name="municipality_name" value="{{ old('municipality_name') }}"  placeholder="市区町村">
                                @error('municipality_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">補足住所</dt>
                            <dd class="shares-create-item-input">
                                <input id="supplementary_address" class="js-require @error('supplementary_address') is-invalid @enderror" type="text" name="supplementary_address" value="{{ old('supplementary_address') }}"  placeholder="補足住所">
                                @error('supplementary_address')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">シェアハウス画像</dt>
                            <dd class="shares-create-item-input">
                                <input  id="share_picture" class="js-require @error('share_picture') is-invalid @enderror" type="text" name="share_picture" value="{{ old('share_picture') }}"  placeholder="シェアハウス画像">
                                @error('share_picture')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">シェアハウス説明</dt>
                            <dd class="shares-create-item-input">
                                <textarea id="share_text" class="@error('share_text') is-invalid @enderror"  name="share_text" value="{{ old('share_text') }}" placeholder="シェアハウス説明"></textarea>
                                @error('share_text')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt>
                                <label for="exampleFormControlSelect1" class="shares-create-item-title">交流について</label>
                            </dt>
                            <dd>
                                <select class="select-form shares-create-item-input share-select form-control @error('exchange_about') is-invalid @enderror" name="exchange_about" id="exampleFormControlSelect1 exchange_about">
                                    <option value="-" @if(old('exchange_about')=="-") selected @endif>選択してください</option>
                                    <option value=1 @if(old('exchange_about')==1) selected @endif>1: 日本人との交流が多い</option>
                                    <option value=2>2: 外国人との交流が多い</option>
                                    <option value=3>3: 挨拶程度の交流</option>
                                    <option value=4>4:ほとんど交流なし</option>
                                </select>
                                @error('exchange_about')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title mb-2">築年数</dt>
                            <dd class="shares-create-item-input">
                                <input id="build_age" class="js-require input-form @error('build_age') is-invalid @enderror" type="text" name="build_age" value="{{ old('build_age') }}" placeholder="築年数">
                                @error('build_age')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt>
                                <label for="exampleFormControlSelect1" class="shares-create-item-title mb-2">個室</label>
                            </dt>
                            <dd>
                                <select class="select-form shares-create-item-input share-select form-control" name="private_room" id="exampleFormControlSelect1">
                                    <option value="-" selected>選択してください</option>
                                    <option value=4>4畳</option>
                                    <option value=4.5>4.5畳</option>
                                    <option value=5>5畳</option>
                                    <option value=5.5">5.5畳</option>
                                    <option value=6>6畳</option>
                                    <option value=6.5> 6.5畳</option>
                                    <option value=7>7畳</option>
                                    <option value=7.5>7.5畳</option>
                                    <option value=8>8畳</option>
                                    <option value=8.5>8.5畳</option>
                                    <option value=9>9畳,</option>
                                    <option value=9.5>9.5畳,</option>
                                    <option value=10>10畳</option>
                                    <option value=10.5>10.5畳</option>
                                    <option value=11>11畳</option>
                                    <option value=11.5>11.5畳</option>
                                    <option value=12>12畳</option>
                                    <option value=12.5>12.5畳</option>
                                    <option value=13>13畳以上</option>
                                    <option value=0>個室なし</option>
                                </select>
                                @error('private_room')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt>
                                <label for="exampleFormControlSelect1" class="shares-create-item-title mb-2">ドミトリーについて</label>
                            </dt>
                            <dd>
                                <select class="select-form shares-create-item-input share-select form-control" name="dormitory_room" id="exampleFormControlSelect1">
                                    <option value="-" selected>選択してください</option>
                                    <option value=4>4畳</option>
                                    <option value=4.5>4.5畳</option>
                                    <option value=5>5畳</option>
                                    <option value=5.5">5.5畳</option>
                                    <option value=6>6畳</option>
                                    <option value=6.5> 6.5畳</option>
                                    <option value=7>7畳</option>
                                    <option value=7.5>7.5畳</option>
                                    <option value=8>8畳</option>
                                    <option value=8.5>8.5畳</option>
                                    <option value=9>9畳,</option>
                                    <option value=9.5>9.5畳,</option>
                                    <option value=10>10畳</option>
                                    <option value=10.5>10.5畳</option>
                                    <option value=11>11畳</option>
                                    <option value=11.5>11.5畳</option>
                                    <option value=12>12畳</option>
                                    <option value=12.5>12.5畳</option>
                                    <option value=13>13畳以上</option>
                                    <option value=0>ドミトリーなし</option>
                                </select>
                                @error('dormitory_room')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title mb-2">アクセスについて</dt>
                            <dd class="shares-create-item-input">
                                <textarea id="access_about" class="@error('access_about') is-invalid @enderror"  name="access_about" value="{{ old('access_about') }}" placeholder="アクセスについて"></textarea>
                                @error('access_about')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt>
                                <label for="exampleFormControlSelect1" class="shares-create-item-title mb-2">友人の宿泊の有無</label>
                            </dt>
                            <dd>
                                <select class="select-form shares-create-item-input share-select form-control" name="friends_exchange" id="exampleFormControlSelect1">
                                    <option value="-" selected>選択してください</option>
                                    <option value="あり">あり</option>
                                    <option value="なし">なし</option>
                                    <option value="条件付きであり">条件付きであり</option>
                                </select>
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title mb-2">友人の宿泊に対する条件</dt>
                            <dd class="shares-create-item-input">
                                <textarea id="friend_desc" class="@error('friend_desc') is-invalid @enderror"  name="friend_desc" value="{{ old('friend_desc') }}" placeholder="条件について"></textarea>
                                @error('friend_desc')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt>
                                <label for="exampleFormControlSelect1" class="shares-create-item-title mb-2">男女比率</label>
                            </dt>
                            <dd>
                                <select class="select-form shares-create-item-input share-select form-control" name="gender_ratio" id="exampleFormControlSelect1">
                                    <option value="-" selected>選択してください</option>
                                    <option value="入居者なし">入居者なし</option>
                                    <option value="男性:10・女性:0">男性:10・女性:0</option>
                                    <option value="男性:9・女性:1">男性:9・女性:1</option>
                                    <option value="男性:8・女性:2">男性:8・女性:2</option>
                                    <option value="男性:7・女性:3">男性:7・女性:3</option>
                                    <option value="男性:6・女性:4">男性:6・女性:4</option>
                                    <option value="男性:5・女性:5">男性:5・女性:5</option>
                                    <option value="男性:4・女性:6">男性:4・女性:6</option>
                                    <option value="男性:3・女性:7">男性:3・女性:7</option>
                                    <option value="男性:2・女性:8">男性:2・女性:8</option>
                                    <option value="男性:1・女性:9">男性:1・女性:9</option>
                                    <option value="男性:0・女性:10">男性:0・女性:10</option>
                                </select>
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt>
                                <label for="exampleFormControlSelect1" class="shares-create-item-title mb-2">日本人と外国人の比率</label>
                            </dt>
                            <dd>
                                <select class="select-form shares-create-item-input share-select form-control" name="jp_ov_ratio" id="exampleFormControlSelect1">
                                    <option value="-" selected>選択してください</option>
                                    <option value="入居者なし">入居者なし</option>
                                    <option value="日本人:10・外国人:0">日本人:10・外国人:0</option>
                                    <option value="日本人:9・外国人:1">日本人:9・外国人:1</option>
                                    <option value="日本人:8・外国人:2">日本人:8・外国人:2</option>
                                    <option value="日本人:7・外国人:3">日本人:7・外国人:3</option>
                                    <option value="日本人:6・外国人:4">日本人:6・外国人:4</option>
                                    <option value="日本人:5・外国人:5">日本人:5・外国人:5</option>
                                    <option value="日本人:4・外国人:6">日本人:4・外国人:6</option>
                                    <option value="日本人:3・外国人:7">日本人:3・外国人:7</option>
                                    <option value="日本人:2・外国人:8">日本人:2・外国人:8</option>
                                    <option value="日本人:1・外国人:9">日本人:1・外国人:9</option>
                                    <option value="日本人:0・外国人:10">日本人:0・外国人:10</option>
                                </select>
                                @error('jp_ov_ratio')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title mb-2">年齢層の比率</dt>
                            <dd class="shares-create-item-input">
                                <input id="age_ratio" type="text" class="input-form @error('age_ratio') is-invalid @enderror" name="age_ratio" value="{{ old('age_ratio') }}" autocomplete="age_ratio" autofocus placeholder="年齢層について">
                                @error('age_ratio')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </dd>
                        </div>
                    </dl>
                    <button type="submit" class="btn">投稿する</button>
                </form>
            </div>
        </div>
    </div>

    @include('common/footer')

@endsection
