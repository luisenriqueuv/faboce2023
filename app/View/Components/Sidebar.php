<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{
    public $permiso;
    public $uri;

    public function __construct()
    {
        $aux = explode('.', Route::currentRouteName());
        $this->uri = $aux[0];
        $this->permiso = Auth::user()->permiso;
    }

    public function render()
    {
        return view('components.sidebar');
    }
}
