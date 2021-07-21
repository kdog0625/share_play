@extends('app')

@section('title', 'share play トップページ')

@section('content')

    @include('common.users.nav')
    <div class="shares-content">
        <div class="container">
            <div class="shares-create" enctype="multipart/form-data">
                <form method="POST" action="{{ route('shares.update', ['share' => $share]) }}" class="shares-create-form">
                    @method('PATCH')
                    @csrf
                    <dl class="shares-create-list">
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title mb-3">シェアハウス名</dt>
                            <dd class="shares-create-item-input">
                                <input class="js-require" type="text" name="shara_name" placeholder="シェアハウス名" value="{{ $share->shara_name ?? old('shara_name') }}">
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title mb-3">都道府県名</dt>
                            <dd class="shares-create-item-input share-select">
                                <select name="prefecture_name" id="js-require">
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
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">市区町村</dt>
                            <dd class="shares-create-item-input">
                                <input class="js-require" type="text" name="municipality_name" placeholder="市区町村">
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">補足住所</dt>
                            <dd class="shares-create-item-input">
                                <input class="js-require" type="text" name="supplementary_address" placeholder="補足住所">
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">シェアハウス画像</dt>
                            <dd class="shares-create-item-input">
                                <input class="js-require" type="text" name="share_picture" placeholder="シェアハウス画像">
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">シェアハウス説明</dt>
                            <dd class="shares-create-item-input">
                                <textarea name="share_text"  placeholder="シェアハウス説明" required></textarea>
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">交流について</dt>
                            <dd class="shares-create-item-input">
                                <select name="exchange_about" id="js-require">
                                    <option value="-" selected>選択してください</option>
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                </select>
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">築年数</dt>
                            <dd class="shares-create-item-input">
                                <input class="js-require" type="text" name="build_age" placeholder="築年数">
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">マネージャーID</dt>
                            <dd class="shares-create-item-input">
                                <input class="js-require" type="text" name="admin_users_id" placeholder="築年数">
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">個室</dt>
                            <dd class="shares-create-item-input">
                                <select name="private_room" id="js-require">
                                    <option value="-" selected>選択してください</option>
                                    <option value=4>4</option>
                                    <option value="4.5畳">4.5畳</option>
                                    <option value="5畳">5畳</option>
                                    <option value="5.5畳">5.5畳</option>
                                    <option value="6畳">6畳</option>
                                    <option value=" 6.5畳"> 6.5畳</option>
                                    <option value="7畳">7畳</option>
                                    <option value="7.5畳">7.5畳</option>
                                    <option value="8畳">8畳</option>
                                    <option value="8.5畳">8.5畳</option>
                                    <option value="9畳,">9畳,</option>
                                    <option value="9.5畳,">9.5畳,</option>
                                    <option value="10畳">10畳</option>
                                    <option value="10.5畳">10.5畳</option>
                                    <option value="11畳">11畳</option>
                                    <option value="11.5畳">11.5畳</option>
                                    <option value="12畳">12畳</option>
                                    <option value="12.5畳">12.5畳</option>
                                    <option value="13畳以上">13畳以上</option>
                                    <option value="個室なし">個室なし</option>
                                </select>
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">ドミトリーについて</dt>
                            <dd class="shares-create-item-input">
                                <select name="dormitory_room" id="js-require">
                                    <option value="-" selected>選択してください</option>
                                    <option value=4>4</option>
                                    <option value="4.5畳">4.5畳</option>
                                    <option value="5畳">5畳</option>
                                    <option value="5.5畳">5.5畳</option>
                                    <option value="6畳">6畳</option>
                                    <option value=" 6.5畳"> 6.5畳</option>
                                    <option value="7畳">7畳</option>
                                    <option value="7.5畳">7.5畳</option>
                                    <option value="8畳">8畳</option>
                                    <option value="8.5畳">8.5畳</option>
                                    <option value="9畳,">9畳,</option>
                                    <option value="9.5畳,">9.5畳,</option>
                                    <option value="10畳">10畳</option>
                                    <option value="10.5畳">10.5畳</option>
                                    <option value="11畳">11畳</option>
                                    <option value="11.5畳">11.5畳</option>
                                    <option value="12畳">12畳</option>
                                    <option value="12.5畳">12.5畳</option>
                                    <option value="13畳以上">13畳以上</option>
                                    <option value="ドミトリーなし">ドミトリーなし</option>
                                </select>
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">アクセスについて</dt>
                            <dd class="shares-create-item-input">
                                <input class="js-require" type="text" name="access_about" placeholder="アクセスについて">
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">友人の宿泊の有無</dt>
                            <dd class="shares-create-item-input">
                                <input class="js-require" type="text" name="friends_exchange" placeholder="友人の宿泊の有無">
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">友人の宿泊に対する条件</dt>
                            <dd class="shares-create-item-input">
                                <select name="friend_desc" id="js-require">
                                    <option value="-" selected>選択してください</option>
                                    <option value="あり">あり</option>
                                    <option value="なし">なし</option>
                                    <option value="条件付きであり">条件付きであり</option>
                                </select>
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">男女比率</dt>
                            <dd class="shares-create-item-input">
                                <input class="js-require" type="text" name="gender_ratio" placeholder="男女比率">
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">日本人と外国人の比率</dt>
                            <dd class="shares-create-item-input">
                                <input class="js-require" type="text" name="jp_ov_ratio" placeholder="日本人と外国人の比率">
                            </dd>
                        </div>
                        <div class="shares-create-item">
                            <dt class="shares-create-item-title">年齢層の比率</dt>
                            <dd class="shares-create-item-input">
                                <input class="js-require" type="text" name="age_ratio" placeholder="交流について">
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
