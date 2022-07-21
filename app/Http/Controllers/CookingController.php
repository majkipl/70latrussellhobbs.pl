<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CookingController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $collectionName = 'cooking';

        $products = Product::getByCollection($collectionName);

        return view('product/index', [
            'collection' => $collectionName,
            'products' => $products
        ]);
    }
}
