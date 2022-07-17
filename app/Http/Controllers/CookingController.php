<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CookingController extends Controller
{
    public function index()
    {
        $collectionName = 'cooking';

        //todo: add cache
        $products = Product::with('collection')
            ->whereHas('collection', function ($query) use ($collectionName) {
                $query->where('name', '=', $collectionName);
            })
            ->get();

        return view('product/index', [
            'collection' => $collectionName,
            'products' => $products
        ]);
    }
}
