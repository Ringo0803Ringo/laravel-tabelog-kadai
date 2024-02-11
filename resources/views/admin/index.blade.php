@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fs-4">店舗一覧</div>
                <table class="ms-4 mt-2">
                    <tr>
                        <td class="fs-5">店舗名</td>
                        <td class="fs-5">カテゴリー</td>
                        <td class="fs-5">営業時間</td>
                        <td class="fs-5">電話番号</td>
                    </tr>
                    @foreach($stores as $store)
                    <tr>
                        <td><a href="{{ route('store.show', $store->id) }}">{{ $store->name}}</a></td>
                        <td>{{ $store->category->name}}</td>
                        <td>{{ $store->business_hour}}</td>
                        <td>{{ $store->phone_number}}</td>
                        <td class="btn btn-primary mb-2 btn-sm">削除</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <a href="{{ route('store.create') }}" class="btn btn-primary mt-3">新規店舗登録</a>
</div>

@endsection