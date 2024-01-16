@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        @foreach ($stores as $store)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $store->name }}</h5>
                        <p class="card-text">{{ $store->description }}</p>
                        <a href="{{ route('store.show', $store) }}" class="btn btn-primary">View Store</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection