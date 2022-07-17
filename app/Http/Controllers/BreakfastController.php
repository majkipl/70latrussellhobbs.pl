<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BreakfastController extends Controller
{
    public function index()
    {
        $collectionName = 'breakfast';

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
