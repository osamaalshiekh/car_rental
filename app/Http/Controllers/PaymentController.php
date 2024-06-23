<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Car;
use App\Models\Invoice;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe\PaymentIntent;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function showPaymentForm(Car $car)
    {
        return view('payment.form', compact('car'));
    }

    public function createCheckoutSession(Request $request, Car $car)
    {
        $user = Auth::user();
        $pickupDate = Carbon::parse($request->pickup_date);
        $returnDate = Carbon::parse($request->return_date);
        $total = $car->price * $pickupDate->diffInDays($returnDate);

        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $checkoutSession = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => $car->model],
                        'unit_amount' => $car->price * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('checkout.success', ['session_id' => '{CHECKOUT_SESSION_ID}']),
                'cancel_url' => route('checkout.cancel'),
            ]);

            // Store data in session to use after payment is confirmed
            session([
                'stripe_checkout_session_id' => $checkoutSession->id,
                'car_id' => $car->id,
                'user_id' => $user->id,
                'pickup_date' => $pickupDate,
                'return_date' => $returnDate,
                'total' => $total
            ]);

            return redirect($checkoutSession->url);
        } catch (\Exception $e) {
            return redirect()->route('checkout.cancel')->with('error', $e->getMessage());
        }
    }

    public function success()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $sessionId = session('stripe_checkout_session_id');
        $carId = session('car_id');
        $userId = session('user_id');
        $pickupDate = session('pickup_date');
        $returnDate = session('return_date');
        $total = session('total');

        session()->forget(['stripe_checkout_session_id', 'car_id', 'user_id', 'pickup_date', 'return_date', 'total']);
        $days = Carbon::parse($pickupDate)->diffInDays(Carbon::parse($returnDate));

        try {
            $checkoutSession = StripeSession::retrieve($sessionId);
             PaymentIntent::retrieve($checkoutSession->payment_intent);

            // Ensure car is still available
            $car = Car::find($carId);
            if (!$car || !$car->availability) {
                return redirect()->route('home')->with('error', 'Car not available.');
            }

            // Create reservation
            $reservation = new Reservation([
                'user_id' => $userId,
                'car_id' => $carId,
                'rezDate' => $pickupDate,
                'retDate' => $returnDate,
                'price' => $car->price,
                'total' => $total,
                'days'=>$days,
                'payment_status' => 'completed'
            ]);
            $reservation->save();

            // Update car availability
            $car->availability = false;
            $car->save();

            // Create invoice
            $invoice = new Invoice([
                'invoice_number' => $this->generateInvoiceNumber(),
                'date' => Carbon::now(),
                'client_name' => $reservation->user->name,
                'client_email' => $reservation->user->email,
                'total_amount' => $total,
                'due_date' => Carbon::now()->addMonth(),
                'status' => 'sent',
                'car_id' => $carId,
            ]);
            $invoice->save();

            // Send invoice via email
            Mail::to($invoice->client_email)->send(new InvoiceMail($invoice));


            return redirect()->route('detail', ['pid' => $carId])->with('success', 'Payment successful and car reserved.');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
    }


    private function generateInvoiceNumber()
    {
        $latestInvoice = Invoice::latest()->first();
        return $latestInvoice ? $latestInvoice->invoice_number + 1 : 1;
    }

    public function cancel()
    {
        return redirect()->route('home')->with('error', 'Payment cancelled.');
    }
}
