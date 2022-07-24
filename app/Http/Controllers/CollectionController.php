<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CollectionController extends Controller
{

    /**
     * @param string $slug
     * @return Application|Factory|View|never
     */
    public function show(string $slug): View|Factory|Application
    {
        /** @var Collection $collection */
        $collection = Cache::remember('collection-' . $slug, now()->addDay(365), function () use ($slug) {
            return Collection::where('slug', $slug)->first();
        });

        if ($collection) {
            $products = Product::getByCollection($collection->slug);

            return view('product/index', [
                'collection' => $collection,
                'products' => $products
            ]);
        } else {
            return abort(404);
        }
    }
}
