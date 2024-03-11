<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view(
            'subscription_form', [
                'intent' => $user->createSetupIntent()
            ]
        );
    }

    public function edit()
    {
        $user=User::find(Auth::id());
        return view(
            'edit_card', [
                'intent' => $user->createSetupIntent()
            ]
        );
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

    public function update(Request $request)
    {
        $user = User::find(Auth::id());
    
        // フォーム送信の情報から$paymentMethodを取得する
        $paymentMethod = $request->input('stripePaymentMethod');
    
        // ユーザーのデフォルトの支払い方法を更新する
        $user->updateDefaultPaymentMethod($paymentMethod);
    
        // 処理後に適切なページにリダイレクトする
        return redirect()->route('user.show', ['user' => $user])->with('message', '支払い方法が更新されました。');
    }

    public function cancel_subscription(Request $request)
    {
        $user = User::find(Auth::id());
    
        // ユーザーが有料会員であるかを確認
        if ($user->subscribed('default')) {
            // 有料会員の場合、解約処理を実行
            $user->subscription('default')->cancel();
            return redirect()->route('user.show', ['user' => $user])->with('message', 'サブスクリプションを解約しました。');
        } else {
            // 有料会員でない場合は何らかのエラー処理を行うか、メッセージを表示する
            return redirect()->route('user.show', ['user' => $user])->with('error', '有料会員ではありません。');
        }
    }
}
