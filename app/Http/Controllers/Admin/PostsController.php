<?php
namespace App\Http\Controllers\Admin;

use App\Forms\PostsForm;
use App\Http\Controllers\Controller;
use App\Http\Tools\Method;
use App\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Kris\LaravelFormBuilder\FormBuilder;

/**
 * Class PostsController
 *
 * Admin posts controller, manages the addition and editing of new articles
 */
class PostsController extends Controller
{

    /**
     * @return Response
     */
    public function index(): Response
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return response()->view('admin.posts.index', compact('posts'));
    }

    /**
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function create(FormBuilder $formBuilder): Response
    {
        $form = $this->getForm($formBuilder, route('posts.store'));
        return response()->view('admin.posts.create', compact('form'));
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
            return redirect(route('posts.index'))->with('success', "L'article a bien été ajouté");
        }
        return redirect()->back();
    }

    /**
     * @param int $id
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function edit(int $id, FormBuilder $formBuilder): Response
    {
        $post = Post::findOrFail($id);
        $form = $this->getForm(
            $formBuilder,
            route('posts.update', $post),
            Method::PUT,
            $post
        );
        return response()->view('admin.posts.edit', compact('post', 'form'));
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return View
     */
    public function update(Request $request, Post $post)
    {
        if ($post->update($request->all())) {
            return redirect(route('posts.index'))->with('success', "L'article a bien été édité");
        }
        return redirect()->back();
    }

    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        if ($post->delete()) {
            return redirect(route('posts.index'))->with('success', "L'article a bien été supprimé.");
        }
        return redirect(route('posts.index'))->with('error', "L'article n'a pas pu être supprimé.");
    }
}
