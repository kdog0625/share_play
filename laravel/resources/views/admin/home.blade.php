@extends('app')

@section('title', 'share play トップページ')

@section('content')

    @include('common.auth.nav')

    @include('shares/top')

    <div class="shares-content">
        <div class="row col-md-12">
            
        </div>
    </div>

    @include('common/footer')

@endsection


