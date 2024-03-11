@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">名前</label><br>
                    @error('name')
                        <strong class="text-danger">名前を入力してください</strong>
                    @enderror
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label><br>
                    @error('email')
                        <strong class="text-danger">メールアドレスを入力してください</strong>
                    @enderror
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
                <button class="btn btn-primary mt-3">更新</button>
            </form>
        </div>
    </div>
</div>

@endsection
