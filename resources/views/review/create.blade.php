@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">評価</div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="rating">評価（星）</label>
                            <select class="form-control" id="rating">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
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