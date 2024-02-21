<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Laravel\Cashier\Cashier;
use Stripe\Charge;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index()
    {
        $user= User::find(Auth::id());
        return view('subscription_form',  [
            'intent' => $user->createSetupIntent()
        ]);
    }

    public function store(Request $request)
    {
        $user= User::find(Auth::id());
 
        // またStripe顧客でなければ、新規顧客にする
        $stripeCustomer = $user->createOrGetStripeCustomer();
 
        // フォーム送信の情報から$paymentMethodを作成する
        $paymentMethod=$request->input('stripePaymentMethod');
 
        // プランはconfigに設定したbasic_plan_idとする
        $plan=config('services.stripe.basic_plan_id');
        
        // 上記のプランと支払方法で、サブスクを新規作成する
        $user->newSubscription('default', $plan)
        ->create($paymentMethod);
 

        return redirect()->route('user.show', ['user' => $user])->with('success', 'プレミアムプランに登録しました。');
    }
}
