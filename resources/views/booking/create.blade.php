@extends('layouts.app')
 
@section('content')


{{-- @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-3">予約ページ</h2>
            <form action="{{ route('booking.store', $store->id) }}" method="POST">
                @csrf
                <h2 class="mt-5 mb-4">{{ $store->name }}</h2>
                <div class="form-group">
                    <label>日付</label><br>
                    @error('booking_date')
                            <strong class="text-danger">日付を入力してください</strong>
                    @enderror
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="form-group">
                    <label>時間</label><br>
                    @error('booking_time')
                            <strong class="text-danger">時間を入力してください</strong>
                    @enderror
                    <input type="time" class="form-control" name="time">
                </div>
                <div class="form-group">
                    <label>人数</label><br>
                    @error('amount')
                            <strong class="text-danger">人数を入力してください</strong>
                    @enderror
                    <input type="number" step="1" class="form-control" name="amount">
                </div>
                <input type="hidden" name="store_id" value="{{$store->id}}">
                <button type="submit" class="btn btn-primary btn-block mt-3">予約する</button>
            </form>
        </div>
    </div>
</div>

@endsection