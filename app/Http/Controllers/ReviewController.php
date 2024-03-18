<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
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

        return redirect()->back()->with('success', '有料会員でないため、レビューはできません。');
        }

        $request->validate([
            'content' => 'required'
        ],
        [
            'content.required' => 'レビュー内容を入力してください'
        ]);

        $review = new Review();
        $review->content = $request->input('content');
        $review->store_id = $request->input('store_id');
        $review->user_id = Auth::user()->id;
        $review->star = $request->input('star');
        $review->save();

        return back()->with('success', 'レビューを投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id レビューID
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {     
        return view('review.show', compact('review'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        $user = Auth::user();

        return redirect()->route('user.show', ['user' => $user])->with('success', 'レビューを削除しました');
    }
}
