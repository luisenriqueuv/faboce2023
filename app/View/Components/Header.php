<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Auth;

class Header extends Component
{
    
    public $title;
    public $module;
    public $permiso;

    public function __construct($title, $module){
        $this->title  = $title;
        $this->module = $module;
        $this->permiso = Auth::user()->permiso;
    }

    public function render(){
        return view('components.header');
    }

}
