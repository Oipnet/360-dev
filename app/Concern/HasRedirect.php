<?php
namespace App\Concern;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

trait HasRedirect
{

    /**
     * @param Request $request
     * @param string $routeName
     * @param string $message
     * @return RedirectResponse
     */
    protected function redirectWithMessage(Request $request, string $routeName, string $message): RedirectResponse
    {
        $request->session()->flash('success', $message);
        return redirect()->route($routeName);
    }
}
