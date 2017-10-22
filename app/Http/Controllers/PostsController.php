<?php
namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Post;
use Illuminate\View\View;

/**
 * PostsController
 *
 * Blog controller.
 */
class PostsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(): View
    {
        $posts      = Post::paginatePosts();
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'));
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show(string $slug): View
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.view', compact('post'));
    }
}
