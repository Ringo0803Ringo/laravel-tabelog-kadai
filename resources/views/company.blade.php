@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-3">
                <div class="card-header">会社情報</div>
                <div class="card-body">
                    <p class="mt-3">会社名：{{ $companies->name }}</p>
                    <p class="mt-3">郵便番号：{{ $companies->postal_code }}</p>
                    <p class="mt-3">所在地：{{ $companies->address }}</p>
                    <p class="mt-3">電話番号：{{ $companies->phone_number }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
