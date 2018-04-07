<?php
namespace App\Http\Controllers\Admin;

use App\Forms\Admin\PostsForm;
use App\Http\Controllers\Controller;
use App\Http\Tools\Method;
use App\Post;
use App\Repository\PostRepository;
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
		 * @param PostRepository $postRepository
		 * @return Response
		 */
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->getByOrderDesc();
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
		 * @param PostRepository $postRepository
		 * @return \Illuminate\Http\RedirectResponse
		 */
    public function store(Request $request, PostRepository $postRepository)
    {
				$post = $postRepository->save($request->all());
				if ($post) {
						$image = $request->file('image');
						$image->storeAs('posts', $post->getImageName($image));
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
