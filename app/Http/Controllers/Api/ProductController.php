<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddProductRequest;
use App\Http\Requests\Api\IndexApplicationRequest;
use App\Http\Requests\Api\IndexProductRequest;
use App\Http\Requests\Api\UpdateProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * @param IndexApplicationRequest $request
     * @return JsonResponse
     */
    public function index(IndexProductRequest $request): JsonResponse
    {
        $search = $request->input('search');
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 10);
        $searchable = $request->input('searchable', []);
        $filter = $request->input('filter', []);
        $sort = $request->input('sort', 'id');
        $order = $request->input('order', 'asc');

        $query = Product::with(['collection'])->search($search, $searchable)->filter($filter)->orderBy($sort, $order);

        $itemsCount = $query->count('id');
        $items = $query->offset($offset)->limit($limit)->get();

        return response()->json([
            'total' => $itemsCount,
            'rows' => $items
        ], Response::HTTP_OK);
    }

    public function add(AddProductRequest $request)
    {
        DB::beginTransaction();


        try {
            $product = new Product($request->validated());
            $params = $request->all();

            $product->collection_id = $params['collection_id'];

            $product->save();

            Cache::forget('products-' . $product->collection->slug);

            DB::commit();

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('panel.product')
                    ]
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(
                [
                    'errors' => [
                        'main' => [
                            'Nie możemy dodać Twojego zgłoszenia, aby rozwiązać problem skontaktuj się z administratorem serwisu.'
                        ]
                    ],
                    'message' => 'Wewnętrzny błąd serwisu.'
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
    public function update(UpdateProductRequest $request)
    {
        DB::beginTransaction();

        try {
            $product = Product::findOrFail($request->input('id'));
            $product->fill($request->validated());

            $product->save();

            Cache::forget('products-' . $product->collection->slug);

            DB::commit();

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('panel.product')
                    ]
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(
                [
                    'errors' => [
                        'main' => [
                            'Nie możemy zaktualizować rekordu, aby rozwiązać problem skontaktuj się z administratorem serwisu.'
                        ]
                    ],
                    'message' => 'Wewnętrzny błąd serwisu.'
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    public function delete(Product $product): JsonResponse
    {
        DB::beginTransaction();

        try {
            $product->delete();

            Cache::forget('products-' . $product->collection->slug);

            DB::commit();

            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Rekord został pomyślnie usunięty.'
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(
                [
                    'errors' => [
                        'main' => [
                            'Nie możemy usunąć rekordu, aby rozwiązać problem skontaktuj się z administratorem serwisu.'
                        ]
                    ],
                    'message' => 'Wewnętrzny błąd serwisu.'
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
