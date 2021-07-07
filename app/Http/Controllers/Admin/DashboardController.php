<?php

namespace App\Http\Controllers\Admin;

use App\Model\Post;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(): View
    {
        return view('admin.dashboard.index', ['posts_count' => Post::count()]);
    }
}
