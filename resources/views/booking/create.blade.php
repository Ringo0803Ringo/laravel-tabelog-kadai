@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-3">予約ページ</h2>
            <form action="{{ route('booking.store', $store->id) }}" method="POST">
                @csrf
                <h2 class="mt-5 mb-4">{{ $store->name }}</h2>
                <div class="form-group">
                    <label>日付</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="form-group">
                    <label>時間</label>
                    <input type="time" class="form-control" name="time">
                </div>
                <div class="form-group">
                    <label>人数</label>
                    <input type="number" step="1" class="form-control" name="amount">
                </div>
                <input type="hidden" name="store_id" value="{{$store->id}}">
                <button type="submit" class="btn btn-primary btn-block mt-3">予約する</button>
            </form>
        </div>
    </div>
</div>

@endsection