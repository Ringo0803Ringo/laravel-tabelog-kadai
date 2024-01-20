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
                <div class="card-header">評価</div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="rating">評価（星）</label>
                            <select class="form-control" id="rating" name="">
                                <option value="5" class="review-score-color">★★★★★</option>
                                <option value="4" class="review-score-color">★★★★</option>
                                <option value="3" class="review-score-color">★★★</option>
                                <option value="2" class="review-score-color">★★</option>
                                <option value="1" class="review-score-color">★</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comment">コメント</label>
                            <textarea class="form-control" id="comment" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">投稿</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection