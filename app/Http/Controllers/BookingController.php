<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;

class BookingController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store)
    {
        $booking = Booking::all();
        return view('booking.create', compact('booking', 'store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Store $store)
    {
        $user = User::find(Auth::id());

        if (!$user->subscribed('default')) {

        return redirect()->back()->with('success', '有料会員でないため、予約はできません。');
        }

        $currentTime = Carbon::now();

        $request->validate([
            'booking_date' => 'required|after_or_equal:' . $currentTime,
            'booking_time' => [
                'required',
                function ($attribute, $value, $fail) {
                    $startTime = Carbon::createFromFormat('H:i', '10:00');
                    $endTime = Carbon::createFromFormat('H:i', '20:00');
                    $bookingTime = Carbon::createFromFormat('H:i', $value);
                    if ($bookingTime->lt($startTime) || $bookingTime->gt($endTime)) {
                        $fail('営業時間内でなければなりません');
                    }
                },
            ],
            'amount' => 'required'
        ],
        [
            'booking_date.after_or_equal' => '本日以降の日付を選択してください',
            'booking_date.required' => '日付を入力してください',
            'booking_time.required' => '時間を入力してください',
            'amount.required' => '人数を入力してください'
        ]);

        $booking = new Booking();
        $booking->store_id = $request->input('store_id');
        $booking->booking_date = $request->input('booking_date');
        $booking->booking_time = $request->input('booking_time');
        $booking->amount = $request->input('amount');
        $booking->user_id = Auth::user()->id;
        $booking->save();

        return redirect()->route('store.show', $store->id)->with('success', '予約が完了しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $store = Store::find($booking->store_id);
        return view('booking.show', compact('booking', 'store'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking, User $user)
    {
        $booking->delete();
        $user = Auth::user();

        return redirect()->route('user.show', ['user' => $user])->with('success', '予約をキャンセルしました');
    }
}
