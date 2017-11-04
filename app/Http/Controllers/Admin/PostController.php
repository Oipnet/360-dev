<?php

namespace App\Http\Controllers\Admin;

use App\Concern\Admin\TraitAdminController;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    use TraitAdminController;

    const __MODEL = 'App\\Model\\Post';

    protected $view = 'post';

    protected $validator = [];
}
