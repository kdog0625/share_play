@extends('app')

@section('title', 'share play トップページ')

@section('content')

@include('common/nav')

@include('shares/top')

<div class="shares-content">
    <div class="row col-md-12">
        <div class="shares-item col-lg-4 col-md-6">
            <img src="{{ asset('images/top/share-top.jpg') }}" alt="">
            <div class="shares-item-text">aaa</div>
        </div>
        <div class="shares-item col-lg-4 col-md-6">
            <img src="{{ asset('images/top/share-top.jpg') }}" alt="">
            <div class="shares-item-text">aaa</div>
        </div>
        <div class="shares-item col-lg-4 col-md-6">
            <img src="{{ asset('images/top/share-top.jpg') }}" alt="">
            <div class="shares-item-text">
                <div class="shares-item-text-title">
                    <span class="shares-item-text-title-big">aa</span>
                    <span class="shares-item-text-title-small">bb</span>
                </div>
                <div class="shares-item-text-desc">
                    アクセス地域
                </div>
            </div>
        </div>
        <div class="shares-item col-lg-4 col-md-6">
            <img src="{{ asset('images/top/share-top.jpg') }}" alt="">
            <div class="shares-item-text">aaa</div>
        </div>
    </div>
</div>

@include('common/footer')

@endsection


