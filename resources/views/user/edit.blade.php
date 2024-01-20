@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">名前</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
                <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary mt-3">編集</a>
            </form>
        </div>
    </div>
</div>

@endsection