@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mt-3">{{ $store->name }}</h2>
            <p>{{ $store->description }}</p>
        </div>
        <div class="col-md-4">
            <a href="{{ route('booking.create') }}" class="btn btn-primary btn-block mt-3">予約する</a>
        </div>
    </div>
</div>

@endsection