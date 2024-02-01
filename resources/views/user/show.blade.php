@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー情報</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                    </div>
                </div>
            </div>
            
            <div class="card mt-3"> 
                <div class="card-header">予約リスト</div>
                <div class="card-body">
                    <ul>
                        @foreach ($user->bookings as $booking)
                            <li><a href="{{ route('booking.show', $booking->store_id) }}">{{ $booking->store->name }}</a></li>
                        @endforeach
                        <li><a href="{{ route('booking.show', 1) }}">ホゲホゲ</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="card mt-3">
                <div class="card-header">過去のレビュー</div>
                <div class="card-body">
                    <ul>
                        @foreach ($user->reviews as $review)
                            <li><a href="{{ route('review.show', $review->id) }}">{{ $review->store->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">お気に入り店舗</div>
                <div class="card-body">
                    <ul>
                        @foreach ($user->favorites as $favorite)
                        <li><a href="{{ route('store.show', $favorite->store_id) }}">{{ $favorite->store->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
             <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary mt-3">ユーザー情報編集</a>
        </div>
    </div>
</div>

@endsection