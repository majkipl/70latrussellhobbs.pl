<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductUrl;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductUrlController extends Controller
{
    public function urls(string $productCode)
    {
        //todo: add cache
        $urls = ProductUrl::with('product')
                    ->whereHas('product', function ($query) use ($productCode) {
                        $query->where('code', '=', $productCode);
                    })->pluck('url');

        return response()->json([
            'total' => $urls->count(),
            'rows' => $urls
        ], Response::HTTP_OK);
    }
}
