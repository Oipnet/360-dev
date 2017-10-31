<?php

namespace App\Http\Controllers\Admin;

use App\Concern\Admin\TraitAdminController;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    use TraitAdminController;

    const __MODEL = 'App\\Model\\Role';

    protected $view = 'role';

    protected $validator = [];
}
