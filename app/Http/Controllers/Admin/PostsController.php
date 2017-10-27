<?php
namespace App\Http\Controllers\Admin;

use App\Forms\PostsForm;
use App\Http\Controllers\Controller;
use App\Http\Tools\Method;
use App\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

/**
 * Class PostsController
 *
 * Admin posts controller, manages the addition and editing of new articles
 */
class PostsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(): View
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $this->getForm($formBuilder, route('posts.store'));
        return view('admin.posts.create', compact('form'));
    }

    /**
     * @param FormBuilder $formBuilder
     * @param string $url
     * @param string $method
     * @param null $model
     * @return \Kris\LaravelFormBuilder\Form
     */
    private function getForm(FormBuilder $formBuilder, string $url, string $method = Method::POST, $model = null)
    {
        return $formBuilder->create(PostsForm::class, compact('method', 'url', 'model'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        if ($post) {
            return $this->redirectWithMessage($request, 'posts.index', "L'article a bien été ajouté");
        }
        return redirect()->back();
    }

    /**
     * @param int $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function edit(int $id, FormBuilder $formBuilder): View
    {
        $post = Post::findOrFail($id);
        $form = $this->getForm(
            $formBuilder, route('posts.update', $post), Method::PUT, $post
        );
        return view('admin.posts.edit', compact('post', 'form'));
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return View
     */
    public function update(Request $request, Post $post)
    {
        if ($post->update($request->all())) {
            return $this->redirectWithMessage($request, 'posts.index', "L'article a bien été édité");
        }
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param string $routeName
     * @param string $message
     * @return RedirectResponse
     */
    private function redirectWithMessage(Request $request, string $routeName, string $message): RedirectResponse
    {
        $request->session()->flash('success', $message);
        return redirect()->route($routeName);
    }

    /**
     * @param Post $post
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Post $post, Request $request): RedirectResponse
    {
        if ($post->delete()) {
            return $this->redirectWithMessage($request, 'posts.index', "L'article a bien été supprimé.");
        }
        return $this->redirectWithMessage($request, 'posts.index', "L'article n'a pas pu être supprimé.");
    }
}
