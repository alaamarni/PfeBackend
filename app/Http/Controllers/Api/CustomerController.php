<?php

namespace App\Http\Controllers\Api;
use app\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function purchase(Request $request)
    {
        $customer=Customer::firstOrCreate(
            [
                'email'=>$request->input('email')
            ],
            [
                'password'=>Hash::make(Str::random(12)),
                'name'=>$request->input('name'),
                'address'=>$request->input('address'),                'address'=>$request->input('address'),
                'city'=>$request->input('city'),
                'state'=>$request->input('state'),




            ]
            );

            try {
                $payment =$customer->charge(
                    $request->input('amount'),
                    $request->input('payment_method_id')
                );

                $payment = $payment->asStripePaymentIntent();
                $order = $customer->orders()
                ->create([
                    'transaction_id' =>$payment->charge->data[0]->id,
                    'total'=>$payment->charge->data[0]->amount
                ]);
                    foreach (json_decode($request->input('cart'),true) as $item){
                        $order->products()
                        ->attach($item['id'],['quantity'=>$item['quantity']]);

                    }
                    $order->load('products');
                    return $order;
                }
                catch(\Exception $e){
                    return response()->json(['message'=>$e->getMessage()],500);

                }

                }
            }

