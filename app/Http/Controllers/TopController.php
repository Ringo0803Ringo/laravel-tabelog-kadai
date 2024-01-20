<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;

class TopController extends Controller
{
    public function get_top(Request $request) {
        $categories = Category::all();
        if (isset($request->keyword)) {
            $stores = Store::
                where('name', $request->keyword)
                ->orWhere('description', $request->keyword)
                ->get();
            }
            else {
                $stores= Store::get();
            }
        
        return view('top', [
            'categories' => $categories,
            'stores' => $stores,
            'keyword' => $request->keyword
        ]);
    }
}
