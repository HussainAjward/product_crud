<?php

namespace App\Http\Controllers;

use domain\Facades\ProductFacade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $response['tasks'] = ProductFacade::allActive();
        return view('pages.home.index')->with($response);
    }
}
