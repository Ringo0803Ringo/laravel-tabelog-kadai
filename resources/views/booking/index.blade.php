@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>予約ページ</h2>
            <form>
                <div class="form-group">
                    <label for="name">店舗名</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="date">日付</label>
                    <input type="date" class="form-control" id="date">
                </div>
                <div class="form-group">
                    <label for="time">時間</label>
                    <input type="time" class="form-control" id="time">
                </div>
                <button type="submit" class="btn btn-primary">提出</button>
            </form>
        </div>
    </div>
</div>

@endsection