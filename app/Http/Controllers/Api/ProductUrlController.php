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
        $urls = ProductUrl::getByProductCode($productCode);

        return response()->json([
            'total' => $urls->count(),
            'rows' => $urls
        ], Response::HTTP_OK);
    }
}
