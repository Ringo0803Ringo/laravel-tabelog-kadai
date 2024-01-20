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
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="店舗名を入力">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">検索</button>
                    </span>
                </div>
            </form>
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
            <h2>新着店舗</h2>
            <!-- 新着店舗はデータベースから取得 -->
        </div>
    </div>
</div>

@endsection

@section('pagejs')

@endsection