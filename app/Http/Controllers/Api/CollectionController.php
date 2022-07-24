<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddCollectionRequest;
use App\Http\Requests\Api\IndexApplicationRequest;
use App\Http\Requests\Api\IndexCollectionRequest;
use App\Http\Requests\Api\UpdateCollectionRequest;
use App\Models\Collection;
use App\Services\SlugService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    public function __construct(protected SlugService $slugService)
    {
    }

    /**
     * @param IndexApplicationRequest $request
     * @return JsonResponse
     */
    public function index(IndexCollectionRequest $request): JsonResponse
    {
        $search = $request->input('search');
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 10);
        $searchable = $request->input('searchable', []);
        $filter = $request->input('filter', []);
        $sort = $request->input('sort', 'id');
        $order = $request->input('order', 'asc');

        $query = Collection::search($search, $searchable)->filter($filter)->orderBy($sort, $order);

        $collectionsCount = $query->count('id');
        $collections = $query->offset($offset)->limit($limit)->get();

        return response()->json([
            'total' => $collectionsCount,
            'rows' => $collections
        ], Response::HTTP_OK);
    }

    public function add(AddCollectionRequest $request)
    {
        DB::beginTransaction();

        try {
            $collection = new Collection($request->validated());
            $params = $request->all();

            if ($params['slug'] !== null) {
                $collection->slug = $this->slugService->generateUniqueSlug($params['slug']);
            } else {
                $collection->slug = $this->slugService->generateUniqueSlug($params['name']);
            }

            $collection->save();

            DB::commit();

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('panel.collection')
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
    public function update(UpdateCollectionRequest $request)
    {
        DB::beginTransaction();

        try {
            $collection = Collection::findOrFail($request->input('id'));
            $collection->fill($request->validated());

            $params = $request->all();

            if ($params['slug'] !== null) {
                $collection->slug = $this->slugService->generateUniqueSlug($params['slug'], $collection->slug);
            } else {
                $collection->slug = $this->slugService->generateUniqueSlug($params['name'], $collection->slug);
            }

            $collection->save();

            Cache::forget('products-' . $collection->slug);
            Cache::forget('collection-' . $collection->slug);

            DB::commit();

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route('panel.collection')
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

    /**
     * @param Collection $collection
     * @return JsonResponse
     */
    public function delete(Collection $collection): JsonResponse
    {
        DB::beginTransaction();

        try {
            $collection->delete();

            Cache::forget('products-' . $collection->slug);
            Cache::forget('collection-' . $collection->slug);

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
