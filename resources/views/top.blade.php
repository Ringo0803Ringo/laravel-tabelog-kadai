@extends('layouts.app')

@section('pagecss')
{{-- top pageで使うCSS --}}
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2 ms-3">
            <h3>店舗一覧</h3>
            <!-- 新着店舗はデータベースから取得 -->
            <div class="container">
                <div class="row">
                    @foreach ($stores as $store)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $store->name }}</h5>
                                    <img src="https://placehold.jp/150x100.png">
                                    <p class="card-text">{{ $store->category->name }}</p>
                                </div>
                                <a href="{{ route('store.show', $store) }}" class="btn btn-primary">店舗詳細</a>
                            </div>
                        </div>
                    @endforeach
                    {{ $stores->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pagejs')

@endsection