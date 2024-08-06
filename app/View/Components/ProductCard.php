<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $name;
    public $description;
    public $price;
    public $image;
    public $category;

    
    public function __construct($name, $description, $price, $image, $category)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->category = $category;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.product-card');
    }
}
