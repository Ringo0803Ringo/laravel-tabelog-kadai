@extends('layouts.app')

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mt-3 mb-4">{{ $store->name }}</h2>
            <img src="https://placehold.jp/300x200.png">
            <p class="mt-4">{{ $store->description }}</p>
            <p>営業時間：{{$store->business_hour}}</p>
            <p>価格：{{$store->price}}</p>
            <p>郵便番号：{{$store->postal_code}}</p>
            <p>住所：{{$store->adress}}</p>
            <p>電話番号：{{$store->phone_number}}</p>
            <p>定休日：{{$store->holiday}}</p>

        </div>
        <div class="offset-md-8">
            <a href="{{ route('store.booking', $store) }}" class="btn btn-primary btn-block mt-3">予約する</a>
            <a href="{{ route('store.favorite', $store) }}" class="btn btn-primary btn-block mt-3">お気に入り</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            @foreach($reviews as $review)
                <p class="h3">{{$review->content}}</p>
                <label>{{$review->created_at}} {{$review->user->name}}</label>
            @endforeach
        </div>
        <div class="col-md-4">
            <form action="{{ route('reviews.store', $store->id) }}" method="POST">
                @csrf
                <h4 class="text-center">レビュー</h4>
                <div class="form-group">
                    <label for="rating" class="h4 mt-4">評価（星）</label>
                    <select class="form-control" id="rating" name="star">
                        <option value="5" class="review-score-color">★★★★★</option>
                        <option value="4" class="review-score-color">★★★★</option>
                        <option value="3" class="review-score-color">★★★</option>
                        <option value="2" class="review-score-color">★★</option>
                        <option value="1" class="review-score-color">★</option>
                    </select>
                </div>
                <h4>レビュー内容</h4>
                @error('content')
                    <strong>レビュー内容を入力してください</strong>
                @enderror
                <textarea name="content" class="form-control"></textarea>
                <input type="hidden" name="store_id" value="{{$store->id}}">
                <button type="submit" class="btn btn-primary btn-block mt-3">レビューを追加</button>
            </form>
        </div>
    </div>
</div>

@endsection