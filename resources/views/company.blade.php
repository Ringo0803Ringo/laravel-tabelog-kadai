@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-3">
                <div class="card-header">会社情報</div>
                <div class="card-body">
                    <p class="mt-3">会社名：{{ $companies->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
