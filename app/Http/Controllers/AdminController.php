<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stores = Store::all(); 

        return view('admin.index', compact('stores'));
    }
}
