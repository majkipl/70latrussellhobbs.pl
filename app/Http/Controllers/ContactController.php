<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    public function __construct(private ContactService $contactService)
    {
    }

    public function send(ContactRequest $request)
    {
        try {
            $request->validated();

            $this->contactService->sendMail($request->all(['name', 'email', 'message', 'legal']));

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'message' => 'Widomość została wysłana. '
                    ]
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {

            dd($e);

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
//        dd('ContactController::send');
    }
}
