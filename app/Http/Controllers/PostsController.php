<?php
namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\View\View;

/**
 * PostsController
 *
 * Blog controller.
 */
class PostsController extends Controller
{
    const POST_PER_PAGE = '15';

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(): View
    {
        $posts      = Post::onlinePosts()->paginate(self::POST_PER_PAGE);
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'));
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show(string $slug): View
    {
        $post       = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        return view('posts.view', compact('post', 'categories'));
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function category(string $slug): View
    {
        $category   = Category::where('slug', $slug)->firstOrFail();
        $posts      = Post::onlinePosts()->where('category_id', $category->id)->paginate(self::POST_PER_PAGE);
        $categories = Category::all();
        return view('posts.category', compact('posts', 'category', 'categories'));
    }
}
