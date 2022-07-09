<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view(
            'form/index',
            [
//                'voivodeships' => Voivodeship::getAllCached(),
//                'products' => Product::getAllCached(),
//                'shops' => Shop::getAllCached(),
//                'freebies' => Free::getAllCached(),
//                'wheres' => Where::getAllCached()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
