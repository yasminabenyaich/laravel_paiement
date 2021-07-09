<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // la clé secret qu'on copier de https://stripe.com/docs/payments/integration-builder
        \Stripe\Stripe::setApiKey('sk_test_51JAVaCIsdDaWb8u45GMAh7WWAsttpQtiVF5feM0mLNhEewUnOHgvW5llkHZKmEtfZqwgyuSXyeCBrUuZr6mlZqky009mIyXuQn');
        
        // intention de paiement, on indique le prix total du panier (Cart::total()) et l'unité de paiement (eur)
        $intent = \Stripe\PaymentIntent::create([
            'amount' => round(Cart::total()),
            'currency' => 'eur',
        ]);

        // on récupére la clé secret du client
        $clientSecret = Arr::get($intent, 'client_secret');

        return view('checkout.index', compact('clientSecret'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
