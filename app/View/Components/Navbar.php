<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    // public $users;
    public function __construct( )
    {
        // dd("her");
        // $this->users = $users;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
