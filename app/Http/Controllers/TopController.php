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
    /**
     * 1件データを撮るときは、find()またはfirst()を使う
     * $store = Store::find(1);
     * $store = Store::where('email', "hoge@fuga")->first();
     * 
     * 複数件データを撮るときは、get()またはall()を使う
     * $stores = Store::get();
     * $stores = Store::all();
     */
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $category_id = $request->input('category');

        if (empty($keyword) && empty($category_id)) {
            return redirect()->route('top');
        } else if(empty($keyword) && !empty($category_id)) {
            $stores = Store::where('category_id', $category_id)->paginate(3);
            $categories = Category::all();
            return view('top', ['stores' => $stores, 'categories' => $categories]);
        } else if(!empty($keyword) && empty($category_id)) {
            $stores = Store::where('name', 'like', '%'.$keyword.'%')->paginate(3);
            $categories = Category::all();
            return view('top', ['stores' => $stores, 'categories' => $categories]);
        }
        
        $stores = Store::where('name', 'like', '%'.$keyword.'%')
            ->where('category_id', $category_id)
            ->paginate(3);

        $categories = Category::all();

        return view('top', ['stores' => $stores, 'categories' => $categories]);
    }
}
