@extends('layouts.app')

@section('pagecss')
{{-- top pageで使うCSS --}}
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')

<div class="container-xl">
    <div class="row">
        <div class="col-8 mt-2">
            <h3>店舗一覧</h3>
            <div class="container">
                <div class="row">
                    @foreach ($stores as $store)
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $store->name }}</h5>
                                    @if ($store->image !== "")
                                    <img src="{{ asset($store->image) }}" class="img-thumbnail">
                                    @else
                                    <img src="{{ asset('https://placehold.jp/300x200.png')}}" class="img-thumbnail">
                                    @endif
                                    <p class="card-text">{{ $store->category->name }}</p>
                                </div>
                            </div>
                            <a href="{{ route('store.show', $store) }}" class="btn btn-primary mb-4 ms-3">店舗詳細</a>
                        </div>
                    @endforeach
                    {{ $stores->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
        <div class="col-4">
            @component('layouts.sidebar', ['categories' => $categories, 'sort' => $sort, 'keyword' => $keyword, 'category_id' => $category_id])
            @endcomponent
        </div>
    </div>
</div>

@endsection

@section('pagejs')

@endsection