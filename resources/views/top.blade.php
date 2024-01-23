@extends('layouts.app')

@section('pagecss')
{{-- top pageで使うCSS --}}
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>店舗検索</h2>
            <form action="/search" method="GET">
                <input type="text" name="keyword" placeholder="店舗を検索">
                <button class="btn btn-primary" type="submit">検索</button>
            </form>
            
            <select name="store">
                @foreach($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="col-md-6">
            <h2>カテゴリ検索</h2>
            <form>
                <div class="input-group">
                    <select name="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">検索</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>店舗一覧</h2>
            <!-- 新着店舗はデータベースから取得 -->
            <div class="container">
                <div class="row">
                    @foreach ($stores as $store)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $store->name }}</h5>
                                    <p class="card-text">{{ $store->description }}</p>
                                    <a href="{{ route('store.show', $store) }}" class="btn btn-primary">店舗詳細</a>
                                </div>
                                <a href="{{ route('store.favorite', $store) }}" class="btn btn-primary">お気に入り</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pagejs')

@endsection