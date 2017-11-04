<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class PostsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(): View
    {
        return view('admin.posts.index');
    }

}
