@extends('app')

@section('title', 'share play トップページ')

@section('content')

    @include('common.users.nav')

    @include('shares/top')

    <div class="shares-content">
        <div class="row col-md-12">
            @if($shares)
                @foreach($shares as $share)
                    <div class="shares-item col-lg-4 col-md-6">
                        @if($share->share_picture)
                            <img src="{{ asset('images/top/share-top.jpg') }}" alt="">
                        @endif
                        <div class="shares-item-text-title">
                            <span class="shares-item-text-title-big">{{ $share->shara_name }}</span>
                            <span class="shares-item-text-title-small">{{ $share->prefecture_name }}</span>
                        </div>
                        <div class="shares-item-text-desc">
                            アクセス地域
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    @include('common/footer')

@endsection


