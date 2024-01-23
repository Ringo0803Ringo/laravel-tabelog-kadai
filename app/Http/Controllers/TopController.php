<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;

class TopController extends Controller
{
    public function get_top() {
        $categories = Category::all();
        $stores = Store::all();
        $stores = Store::orderBy('created_at', 'desc')->paginate(3);

        return view('top', [
            'categories' => $categories,
            'stores' => $stores
        ]);
    }

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $results = Store::where('name', 'like', '%'.$keyword.'%')->get();
    return view('top', ['results' => $results]);
    }
}
