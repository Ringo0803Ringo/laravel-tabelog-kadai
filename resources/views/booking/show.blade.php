@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $booking->store->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="rating">日時</label>
                        <p>
                            {{ $booking->booking_date }}
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="comment">時間</label>
                        <p>
                            {{ $booking->booking_time }}
                        </p>
                    </div>
                    <form action="{{ route('booking.destroy', $booking->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary btn-block mt-3" onclick='return confirm("本当に削除しますか？")'>予約キャンセル</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection