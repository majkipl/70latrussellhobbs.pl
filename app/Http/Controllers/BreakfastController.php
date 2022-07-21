<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BreakfastController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $collectionName = 'breakfast';

        $products = Product::getByCollection($collectionName);

        return view('product/index', [
            'collection' => $collectionName,
            'products' => $products
        ]);
    }
}
