<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request, $id, $type, $transactionType){
        $userId = Auth::id();

        if(!in_array($type, ['movie', 'serie'])){
            return redirect()->back()->withErrors('Tipo de producto inválido.');
        }

        $product = ($type === 'movie') ? Movie::find($id) : Serie::find($id);

        if(!$product){
            return redirect()->back()->withErrors('Producto no encontrado');
        }

        $cartItem = Cart::where('user_id', $userId)
        ->where('product_id',$id)
        ->where('product_type', $type)
        ->first();

        if($cartItem){
            $cartItem->update(['transaction_type' => $transactionType]);
        } else {
            Cart::updateOrCreate([
                'user_id' => $userId,
                'product_id' => $id,
                'product_type' => $type,
                'transaction_type' => $transactionType,
            ]);
        }

        return redirect('/');
    }

    public function show(){
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();

        return view('cart', ['cartItems' => $cartItems]);
    }

    public function checkout(){
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        $hasRentalItems = $cartItems->where('transaction_type', 'rental')->isNotEmpty();

        return view('checkout', [
            'cartItems' => $cartItems,
            'hasRentalItems' => $hasRentalItems,
        ]);
    }

    public function clear(){
        $userId = Auth::id();
        Cart::where('user_id', $userId)->delete();
        
        return redirect('/');
    }

    public function proceedPayment(){
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();

        foreach($cartItems as $item){
            if($item->product_type === 'movie'){
                $movie = Movie::find($item->product_id);
                
                if ($movie && $movie->quantity > 0) {
                    $movie->decrement('quantity');
                }
            }elseif($item->product_type === 'serie'){
                $serie = Serie::find($item->product_id);
                
                if ($serie && $serie->quantity > 0) {
                    $serie->decrement('quantity');
                }
            }
        }

        Cart::where('user_id', $userId)->delete();

        return redirect('/successTransaction')->with('success', 'Carrito vaciado y cantidades actualizadas.');
    }
}
