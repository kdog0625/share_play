@extends('app')

@section('title', 'share play トップページ')

@section('content')

    @include('common.auth.nav')

    <div class="shares-content">
        <div class="container">
            <table class="table">
                <tbody>
                <tr class="user-tr">
                    <th class="text-center"></th>
                    <th class="text-center">ID</th>
                    <th class="text-center">シェアハウス名</th>
                    <th class="text-center">都道府県</th>
                    <th class="text-center">築年数</th>
                    <th class="text-center">登録日時</th>
                    <th class="text-center">更新日時</th>
                    <th class="text-center"style="width: 2.5%;">管理</th>
                </tr>
                @if($admin_shares)
                    @foreach($admin_shares as $share)
                        <tr class="user-tr">
                            <th class="text-center"></th>
                            <td class="text-center">{{ $share->id }}</td>
                            <td class="text-center">{{ $share->shara_name }}</td>
                            <td class="text-center">{{ $share->prefecture_name }}</td>
                            <td class="text-center">{{ $share->build_age }}
                                @if($share->build_age < 1)
                                    ヶ月
                                @else
                                    年
                                @endif
                            </td>
                            <td class="text-center">{{ $share->created_at }}</td>
                            <td class="text-center">{{ $share->updated_at }}</td>
                            <td class="text-center">
                                <div class="d-flex">
                                <a class="" href="{{ route('shares.edit', ['share' => $share]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="ml-auto" href="{{ route('shares.destroy', ['share' => $share]) }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    @include('common/footer')

@endsection


