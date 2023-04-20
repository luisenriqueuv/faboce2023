<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Foundation\Application;

class Footer extends Component{

    public $laravelVersion;

    public function __construct(){
        $this->laravelVersion = Application::VERSION;
    }

    public function render(){
        return view('components.footer');
    }

}

