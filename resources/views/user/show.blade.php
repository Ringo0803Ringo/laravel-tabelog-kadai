@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">会員ステータス</div>
                <div class="card-body">
                    @if (!$user->subscribed('default'))
                        <!-- 無料会員情報 -->
                        <h1>無料会員</h1>
                        <p>有料会員になると、予約やレビュー投稿、お気に入り登録ができます。</p>
                        <a href="{{route('checkout.index')}}" class="btn btn-primary">有料会員に登録する</a>
                    @elseif ($user->subscribed('default') && ($user->subscription('default')->ends_at === null || \Carbon\Carbon::parse($user->subscription('default')->ends_at)->lt(now())))
                        <!-- 有料会員情報 -->
                        <h1><i class="fa-solid fa-crown"></i>有料会員</h1>
                        <p>予約やレビュー投稿、お気に入り登録ができます。</p>
                        <form action="{{ route('subscription.cancel') }}" method="POST">
                            @csrf
                            <a href="{{ route('edit_card')}}" class="btn btn-info">お支払方法の変更</a>
                            <button type="submit" class="btn btn-danger">有料会員を解約する</button>
                        </form>
                    @else
                        <!-- 有料会員情報（有効期限付き） -->
                        <h1><i class="fa-solid fa-crown"></i>有料会員</h1>
                        <p>{{ \Carbon\Carbon::parse($user->subscription('default')->ends_at)->format('Y年m月d日') }}まで有効です。</p>
                    @endif
                </div>
            </div>

            <div class="card mt-3">
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
                <div class="card-header">予約店舗</div>
                <div class="card-body">
                    <ul>
                        @foreach ($user->bookings as $booking)
                            <li><a href="{{ route('booking.show', $booking->id) }}">{{ $booking->store->name }}</a></li>
                        @endforeach
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