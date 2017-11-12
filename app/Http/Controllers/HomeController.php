<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;

/**
 * HomeController
 */
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        return response()->view('home');
    }
}
