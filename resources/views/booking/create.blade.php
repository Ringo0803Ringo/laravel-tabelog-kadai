@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-3">予約ページ</h2>
            <form>
                <h2 class="mt-5 mb-4">{{ $store->name }}</h2>
                <div class="form-group">
                    <label for="date">日付</label>
                    <input type="date" class="form-control" id="date">
                </div>
                <div class="form-group">
                    <label for="time">時間</label>
                    <input type="time" class="form-control" id="time">
                </div>
                <div class="form-group">
                    <label for="amount">人数</label>
                    <input type="number" step="1" class="form-control" id="amount">
                </div>
                <input type="hidden" name="store_id" value="{{$store->id}}">
                <a href="{{ route('booking.show', $store->id) }}" class="btn btn-primary mt-3">予約する</a>
            </form>
        </div>
    </div>
</div>

@endsection