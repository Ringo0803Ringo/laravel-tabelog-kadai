@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('store.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="store_name">店舗名</label>
                    <input type="text" class="form-control" id="store_name" name="store_name">
                </div>
                <div class="form-group">
                    <label for="description">説明文</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">登録</button>
            </form>
        </div>
    </div>
</div>


@endsection