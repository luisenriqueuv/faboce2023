<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Navbar extends Component
{
    public $uri;

    public function __construct()
    {
        $aux = explode('.', Route::currentRouteName());
        $this->uri = $aux[0];
    }

    public function render()
    {
        return view('components.navbar');
    }
}
