<?php

namespace App\Http\Controllers\Admin;

use App\Concern\Admin\TraitAdminController;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    use TraitAdminController;

    const __MODEL = 'App\\Model\\Permission';

    protected $view = 'permission';
}
