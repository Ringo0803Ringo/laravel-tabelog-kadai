<?php

namespace App\Http\Controllers;

use App\Models\Store;

class StoreController extends Controller
{
    public function show(Store $store)
    {
        $reviews = $store->reviews()->get();

        return view('store.show', compact('store', 'reviews'));
    }
}
