<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(): View
    {
        return view('admin.dashboard.index');
    }

}
