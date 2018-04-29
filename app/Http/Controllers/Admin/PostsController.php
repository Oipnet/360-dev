<?php
namespace App\Http\Controllers\Admin;

use App\Forms\Admin\PostsForm;
use App\Http\Controllers\Controller;
use App\Post;
use App\Repository\PostRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\FormBuilder;

/**
 * Class PostsController
 *
 * Admin posts controller, manages the addition and editing of new articles
 */
class PostsController extends Controller
{


		/**
		 * @var FormBuilder
		 */
		private $formBuilder;

		/**
		 * PostsController constructor
		 *
		 * @param FormBuilder $formBuilder
		 */
		public function __construct(FormBuilder $formBuilder)
		{
				$this->formBuilder = $formBuilder;
		}

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
     * @return Response
     */
    public function create(): Response
    {
        $form = $this->getForm();
        return response()->view('admin.posts.create', compact('form'));
    }

		/**
		 * @param Post|null $post
		 * @return Form
		 */
    private function getForm(?Post $post = null): Form {
    		$post = $post ?: new Post();
        return $this->formBuilder->create(PostsForm::class, ['model' => $post, 'file' => true]);
    }

	/**
	 * @param Request $request
	 * @param PostRepository $postRepository
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(Request $request, PostRepository $postRepository)
    {
				$post = $postRepository->save($this->getData($request));
				if ($post) {
						if ($request->hasFile('image_file')) {
							$imageFile = $request->file('image_file');
							$imageFile->move('posts', $post->getImageName($imageFile));
						}
						return redirect(route('posts.index'))->with('success', "L'article a bien été ajouté");
        }
        return redirect()->back();
    }

		/**
		 * @param int $id
		 * @param PostRepository $postRepository
		 * @return Response
		 */
    public function edit(int $id, PostRepository $postRepository): Response
    {
        $post = $postRepository->getFirst($id);
        $form = $this->getForm($post);
        return response()->view('admin.posts.edit', compact('post', 'form'));
    }

	/**
	 * @param Request $request
	 * @param Post $post
	 * @return View
	 */
    public function update(Request $request, Post $post)
    {
				if ($post->update($this->getData($request))) {
					if ($request->hasFile('image_file')) {
					$imageFile = $request->file('image_file');
					$imageFile->move('posts', $post->getImageName($imageFile));
				}
				return redirect(route('posts.index'))->with('success', "L'article a bien été édité");
			}
			return redirect()->back();
    }

	/**
	 * @param Post $post
	 * @return RedirectResponse
	 * @throws \Exception
	 */
    public function destroy(Post $post): RedirectResponse
    {
        if ($post->delete()) {
            return redirect(route('posts.index'))->with('success', "L'article a bien été supprimé.");
        }
        return redirect(route('posts.index'))->with('error', "L'article n'a pas pu être supprimé.");
    }

	/**
	 * @param Request $request
	 * @return array
	 */
    private function getData(Request $request): array
		{
			return array_merge($request->all(), ['image' => $request->file('image_file') ?? null]);
		}
}
