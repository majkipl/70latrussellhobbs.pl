<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Models\Product;
use App\Models\Shop;
use App\Models\TypeShop;
use App\Models\Whence;
use App\Services\ApplicationService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApplicationController extends Controller
{
    public function __construct(private ApplicationService $applicationService)
    {
    }

    public function index(): Factory|View|Application
    {
        return view(
            'form/index',
            [
                'shops' => Shop::getAllCached(),
                'types' => TypeShop::getAllCached(),
                'whences' => Whence::getAllCached(),
                'products' => Product::getAllCached()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreApplicationRequest $request
     * @return JsonResponse
     */
    public function store(StoreApplicationRequest $request): JsonResponse
    {
        try {
            $application = $this->applicationService->store(
                $request->validated(),
                $request
            );

            //todo: send email

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route( 'thx.app', ['id' => $application->id])
                    ]
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {

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
}
