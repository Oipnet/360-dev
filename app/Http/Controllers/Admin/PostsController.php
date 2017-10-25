<?php
namespace App\Http\Controllers\Admin;

use App\Forms\PostsForm;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Contracts\View\View;
use Kris\LaravelFormBuilder\FormBuilder;

class PostsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(): View
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(PostsForm::class, [
            'method' => 'POST',
            'url'    => route('posts.store')
        ]);
        return view('admin.posts.create', compact('form'));
    }
}
