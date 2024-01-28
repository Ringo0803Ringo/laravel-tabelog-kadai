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
                    <select class="form-control" id="amount">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">予約する</button>
            </form>
        </div>
    </div>
</div>

@endsection