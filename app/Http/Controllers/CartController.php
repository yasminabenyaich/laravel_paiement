<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
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
        // Condition qui permet d'eviter d'avoir plusieurs mêmes articles => Il fait une recherche de l'id et ensuite si il retrouve => Il va retourner que le produit a déjà été ajouter
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->product_id;
        });

        if ($duplicata->isNotEmpty()) {
            return redirect()->route('products.index')->with('success', 'Le produit a déjà été ajouté.');
        }
        
        // Méthode find pour retrouver un modèle via l'id
        $product = Product::find($request->product_id);

        Cart::add($product->id, $product->title, 1, $product->price)
            ->associate('App\Models\Product');// => Indiquer quel type d'article on a ajouter(la route depuis notre modele)
//Dans sa forme  spécifier l'identifiant, le nom, la quantité, le prix du produit que vous souhaitez ajouter au panier.
        return redirect()->route('products.index')->with('success', 'Le produit a bien été ajouté.');
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
    public function destroy($rowId)
    {
    
        Cart::remove($rowId);

        return back()->with('success', 'Le produit a été supprimé.');

        // Il supprimer(méthode remove) et retourne que l'article a été supprimé
    }
}
