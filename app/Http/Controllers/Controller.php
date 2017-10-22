<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function renderIndex(string $model, string $with = null)
    {
        $db = "\\App\\Model\\" . ucfirst($model);
        if (!is_null($with)) {
            $items = $db::with($with)->paginate(15);
        } else {
            $items = $db::paginate(15);
        }
        $categories = Category::where('type', strtolower($model))->get();
        return view(strtolower($model) . '.index', compact('items', 'categories'));
    }

    public function renderShow(string $model, string $slug)
    {
        $db = "\\App\\Model\\" . ucfirst($model);
        $item = $db::where('slug', $slug)->first();
        return view(strtolower($model) . '.show', compact('item'));
    }
}
