<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardStyle extends Component
{
    public $product;

    /**
     * Create a new component instance.
     *
     * @param $product
     * @return void
     */
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card-style');
    }
}
