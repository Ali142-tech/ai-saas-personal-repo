<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
        public function subscribe(Request $request)
    {
        $user = $request->user();

        $checkout = $user->newSubscription(
            'default',
            $request->price_id
        )->checkout([
            'success_url' => 'http://localhost:3000/success',
            'cancel_url' => 'http://localhost:3000/cancel',
        ]);

        return response()->json([
            'url' => $checkout->url
        ]);
    }

}
