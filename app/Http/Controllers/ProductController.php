<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Line;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Line $line = null){

        if ($line == null) {
            $line = Line::first();

            return redirect()->route('products.index', $line);
        }

        $lines = Line::all();

        $categories = Category::wherehas('line', function($query) use ($line){
            $query->where('id', $line->id);
        })->with('products')->get();

        return view('products.index', compact('lines', 'line', 'categories'));
    }
}
