@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
             <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary mt-3">編集</a>
        </div>
    </div>
</div>

@endsection