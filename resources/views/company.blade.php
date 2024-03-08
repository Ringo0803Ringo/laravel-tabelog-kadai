@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-header">会社情報</div>
        <div class="card-body">
            <h3 class="mt-3">会社名：{{ $companies->name }}</h3>
        </div>
    </div>
</div>

@endsection