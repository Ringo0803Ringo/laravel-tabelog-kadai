<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Store;

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
        $booking = new Booking();
        $booking->store_id = $request->input('store_id');
        $booking->booking_date = $request->input('date');
        $booking->booking_time = $request->input('time');
        $booking->amount = $request->input('amount');
        $booking->user_id = Auth::user()->id;
        $booking->save();

        return back()->with('success', '予約が完了しました');
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
    public function destroy($id)
    {
        //
    }
}
