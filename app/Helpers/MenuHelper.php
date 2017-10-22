<?php
namespace App\Helpers;

/**
 * Class MenuHelper
 */
class MenuHelper
{

    /**
     * @param string $controllerName The name of the controller that we want to check.
     * @param string $className The name of the class that will be added.
     * @return string a css class 'active' if the name of the controller is the current controller
     */
    public static function isActive(string $controllerName, string $className = 'active'): string
    {
        $controllerName    = 'App\\Http\\Controllers\\' . ucfirst($controllerName) . 'Controller';
        $currentController = get_class(\request()->route()->getController());
        return $currentController === $controllerName ? $className : '';
    }
}
