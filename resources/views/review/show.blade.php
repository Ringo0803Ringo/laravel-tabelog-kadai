@extends('layouts.app')

@section('pagecss')
{{-- top pageで使うCSS --}}
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $review->store->name }}</h5>
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="rating">評価（星）</label>
                            <p>
                                @for ($i = 0; $i < $review->star; $i++)
                                    ★
                                @endfor
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="comment">コメント</label>
                            <p>
                                {{ $review->content }}
                            </p>
                        </div>
                        {{-- TODO --}}
                        <form action="{{ route('review.destroy', $review) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary btn-block mt-3">削除</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection