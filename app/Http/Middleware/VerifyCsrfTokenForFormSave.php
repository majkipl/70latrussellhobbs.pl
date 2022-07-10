<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCsrfTokenForFormSave
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return JsonResponse|Response
     */
    public function handle(Request $request, Closure $next): JsonResponse|Response
    {
        if ($request->routeIs('form.save') && ! $request->session()->token()) {
            return new JsonResponse(['error' => 'The CSRF token is missing.'], 422);
        }

        $token = $request->input('_token') ? $request->input('_token') : ($request->header('X-CSRF-TOKEN') ? $request->header('X-CSRF-TOKEN') : '');

        if (! hash_equals(csrf_token(), $token)) {
            return new JsonResponse(['error' => 'The CSRF token is invalid.'], 422);
        }

        return $next($request);
    }
}
