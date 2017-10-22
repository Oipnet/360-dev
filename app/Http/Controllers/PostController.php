<?php
namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * PostsController
 *
 * Blog controller.
 */
class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(): View
    {
        return $this->renderIndex('post', 'user');
    }

    /**
     * @param string $slug
     * @return View
     */
    public function show(string $slug): View
    {
        return $this->renderShow('post', $slug);
    }
}
