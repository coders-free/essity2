<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Line;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {

        /* Cart::instance('shopping');

        $cart = Cart::content()->groupBy(function($item){
            $line = Line::find($item->options->line_id);
            return $line->name;

        })->map(function($item){
            return $item->groupBy(function($item){
                $category = Category::find($item->options->category_id);
                return $category->name;
            });
        }); */

        return view('cart.index');
    }
}
