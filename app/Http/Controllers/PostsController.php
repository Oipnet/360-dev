<?php
namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * PostsController
 *
 * Blog controller.
 */
class PostsController extends Controller
{

	/**
	 * @var CategoryRepository
	 */
	private $categoryRepository;

	/**
	 * @var PostRepository
	 */
	private $postRepository;

	/**
	 * PostsController constructor
	 *
	 * @param CategoryRepository $categoryRepository
	 * @param PostRepository $postRepository
	 */
	public function __construct(CategoryRepository $categoryRepository, PostRepository $postRepository)
	{
		$this->categoryRepository = $categoryRepository;
		$this->postRepository     = $postRepository;
	}

		/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(): View
    {
        $posts      = $this->postRepository->findIsOnline()->paginate(config('app.post_per_page'));
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'));
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show(string $slug): View
    {
        $post       = $this->postRepository->getBySlug($slug);
        $categories = Category::all();
        return view('posts.view', compact('post', 'categories'));
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function category(string $slug): View
    {
        $category   = $this->categoryRepository->getBySlug($slug);
        $posts      = $this->postRepository->findIsOnline($category->id)->paginate(config('app.post_per_page'));
        $categories = Category::all();
        return view('posts.category', compact('posts', 'category', 'categories'));
    }

	/**
	 * @param Post $post
	 * @param AuthManager $auth
	 * @return RedirectResponse
	 */
    public function favoritePost(Post $post, AuthManager $auth): RedirectResponse
	{
		Auth::user()->favorites()->attach($post->id);
		return back();
	}

	/**
	 * @param Post $post
	 * @param AuthManager $auth
	 * @return RedirectResponse
	 */
    public function unFavoritePost(Post $post, AuthManager $auth): RedirectResponse
	{
		$auth->user()->favorites()->detach($post->id);
		return back();
	}
}
