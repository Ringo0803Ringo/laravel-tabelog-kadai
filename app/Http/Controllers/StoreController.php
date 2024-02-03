<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class StoreController extends Controller
{
    // 店舗一覧画面
    public function index()
    {
        // Auth::user()でログイン中のユーザー情報を取得

        /**
         * 今回は、店舗の情報を一覧で取得できればいい。
         * なので、Auth::user()でログイン中のユーザー情報を取得する必要はない。
         */

        $stores = Store::all();
 
        return view('store.index', compact('stores'));
    }

    // 店舗詳細画面
    public function show(Store $store)
    {
        $reviews = $store->reviews()->get();

        return view('store.show', compact('store', 'reviews'));
    }

    
}
