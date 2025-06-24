<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const TABLEBTNVIEW = 'staff.btn-group';

    /**
     * render table button group
     *
     * @param  mixed  $data
     * @return void
     */
    public function buttonGroup($data)
    {
        return view('staff.btn-group', compact('data'));
    }

    public function view($page, $data = null)
    {
        $view = request()->is('staff/*') ? "staff.$page" : "frontend.$page";

        return $data == null ? view($view) : view($view, $data);
    }
}
