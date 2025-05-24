<?php

namespace App\Http\Controllers;

use App\Mail\VerifySubscriber;
use App\Models\Subscriber;
use App\Models\Subscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request, int $hotelId): JsonResponse
    {
        $data = $request->validate([
            'email' => 'required|email',
        ]);

        // Get or create subscriber
        $subscriber = Subscriber::firstOrNew([
            'email' => $data['email']
        ]);

        if (!$subscriber->exists || !$subscriber->verified) {
            // (Re)generate code if needed
            $subscriber->verification_code = random_int(100000, 999999);
            $subscriber->verification_expires_at = now()->addDay();
            $subscriber->verified = false;
            $subscriber->save();

            Mail::to($subscriber->email)
                ->queue(new VerifySubscriber($subscriber));

            return response()->json([
                'message' => 'Verification code sent. Please check your email.',
            ], 202);
        }

        // Subscriber is already verified, then create subscription
        $exists = Subscription::where('subscriber_id', $subscriber->id)
            ->where('hotel_id', $hotelId)
            ->exists();

        if ($exists) {
            return response()->json([
                'message'=>'Already subscribed',
            ], 409);
        }

        Subscription::create([
            'subscriber_id' => $subscriber->id,
            'hotel_id' => $hotelId,
            'ip_address' => $request->getClientIp(),
        ]);

        return response()->json([
            'message'=>'Subscribed',
        ]);
    }

    public function verify(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => 'required|email',
            'code' => 'required|digits:6',
        ]);

        $subscriber = Subscriber::where('email', $data['email'])
            ->firstOrFail();

        if ($subscriber->verified) {
            return response()->json([
                'message'=>'Already verified',
            ], 409);
        }

        if ($subscriber->isExpired()) {
            return response()->json([
                'message'=>'Code expired',
            ], 410);
        }

        if ($subscriber->verification_code !== $data['code']) {
            return response()->json([
                'message'=>'Invalid code',
            ], 422);
        }

        $subscriber->update([
            'verified' => true,
        ]);

        return response()->json([
            'message'=>'Email confirmed. You can now subscribe to hotels.',
        ]);
    }

    public function unsubscribe(string $token): RedirectResponse
    {
        $subscription = Subscription::where('unsubscribe_token', $token)
            ->firstOrFail();
        $subscription->delete();

        return redirect()->back();
    }

    public function status(Request $request, int $hotelId): JsonResponse
    {
        $subscription = Subscription::where('hotel_id', $hotelId)
            ->where('ip_address', $request->getClientIp())
            ->first();

        if ($subscription) {
            return response()->json([
                'subscribed' => true,
                'unsubscribe_url' => route('subscription.unsubscribe', $subscription->unsubscribe_token),
            ]);
        }

        return response()->json([
            'subscribed' => false,
        ]);
    }
}
