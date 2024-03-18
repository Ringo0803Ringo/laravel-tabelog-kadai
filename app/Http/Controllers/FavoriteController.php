<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Store;
use App\Models\User;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::id());

        if (!$user->subscribed('default')) {

        return redirect()->back()->with('success', '有料会員でないため、お気に入り登録はできません。');
        }

        $favorite = new Favorite();
        $favorite->store_id = $request->input('store_id');
        $favorite->user_id = Auth::user()->id;
        $favorite->save();

        return back()->with('success', 'お気に入り登録しました');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Store $store)
    {
        $store = Store::find($request->store_id);
        $store->favorites()->where('user_id', Auth::user()->id)->delete();

        return back()->with('success', 'お気に入りを解除しました');
    }
}
