<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\FormBuilder;

/**
 * Global Admin controller with default base action
 */
abstract class AdminController extends Controller
{

	/**
	 * @var FormBuilder
	 */
	private $formBuilder;

	/**
	 * @var string
	 */
	protected $routePrefix;

	/**
	 * @var string
	 */
	protected $formClass;

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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 * @throws \Exception
	 */
	public function create(): Response
	{
		return $this->renderWithForm('create');
	}

	/**
	 * @param string $view The vies name of action (ex: create, update etc.)
	 * @return Response
	 * @throws \Exception
	 */
	protected function renderWithForm(string $view): Response
	{
		$view = 'admin.' . $this->routePrefix . '.' . $view;
		return response()->view($view, [
			'form' => $this->getForm()
		]);
	}

	/**
	 * @param string $model
	 * @param string[] $data
	 * @return Form
	 * @throws \Exception
	 */
	protected function getForm(string $model = null, array $data = []): Form
	{
		$mainModel = $this->getMainModel();
		$model     = $model ?: new $mainModel();
		return $this->formBuilder->create($this->formClass, array_merge(['model' => $model], $data));
	}

	/**
	 * Get model for the called controller
	 *
	 * @return string The model
	 * @throws \Exception
	 */
	private function getMainModel(): string
	{
		$controllerParts = explode('\\', get_called_class());
		$controller      = end($controllerParts);
		$model           = 'App\\Model\\' . str_replace('Controller', '', $controller);
		if (!class_exists($model)) {
			throw new \Exception("Model $model  does not exist");
		}
		return $model;
	}

	/**
	 * @return string
	 * @throws \Exception
	 */
	public function getFormClass(): string
	{
		if (!class_exists($this->formClass)) {
			throw new \Exception("Form class {$this->formClass}  does not exist");
		}
		return $this->formClass;
	}


}