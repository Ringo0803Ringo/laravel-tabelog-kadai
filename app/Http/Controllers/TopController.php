<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;

class TopController extends Controller
{
    public function get_top() 
    {
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

        $sort = $request->sort;
        if (empty($sort)) {
            $sort = 'price_asc';
        }
        // 文字を_で区切る
        // name_desc, name_ascのどちらかが入っている
        $sortArr = explode('_', $sort);
        // _で区切った配列ができる（nameが入る）
        $sortKey = $sortArr[0];
        // _で区切った配列ができる（descもしくはascが入る）
        $sortValue = $sortArr[1];

        if (empty($keyword) && empty($category_id)) {
            $stores = Store::orderBy($sortKey, $sortValue)
                ->paginate(3);
        } else if(empty($keyword) && !empty($category_id)) {
            $stores = Store::where('category_id', $category_id)
                ->orderBy($sortKey, $sortValue)
                ->paginate(3);
        } else if(!empty($keyword) && empty($category_id)) {
            $stores = Store::where('name', 'like', '%'.$keyword.'%')
                ->orderBy($sortKey, $sortValue)
                ->paginate(3);
        } else {    
            $stores = Store::where('name', 'like', '%'.$keyword.'%')
            ->where('category_id', $category_id)
            ->orderBy($sortKey, $sortValue)
            ->paginate(3);
        }

        $categories = Category::all();

        return view('top', [
            'stores' => $stores,
            'categories' => $categories,
            'keyword' => $keyword,
            'category_id' => $category_id,
            'sort' => $sort
        ]);
    }
}
