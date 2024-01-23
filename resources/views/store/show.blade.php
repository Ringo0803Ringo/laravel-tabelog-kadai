@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mt-3">{{ $store->name }}</h2>
            <img src="https://placehold.jp/300x200.png">
            <p>{{ $store->description }}</p>
            <p>営業時間：{{$store->business_hour}}</p>
            <p>価格：{{$store->price}}</p>
            <p>郵便番号：{{$store->postal_code}}</p>
            <p>住所：{{$store->adress}}</p>
            <p>電話番号：{{$store->phone_number}}</p>
            <p>定休日：{{$store->holiday}}</p>

        </div>
        <div class="col-md-4">
            <a href="{{ route('booking.create') }}" class="btn btn-primary btn-block mt-3">予約する</a>
        </div>
    </div>
    <div class="col-md-4">
        <a href="{{ route('review.create') }}" class="btn btn-primary btn-block mt-5">レビュー</a>
    </div>
    
</div>

@endsection