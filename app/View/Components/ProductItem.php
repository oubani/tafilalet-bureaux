<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductItem extends Component
{
    public $image;
    public $ref;
    public $name;
    public $size;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image, $ref, $name, $size)
    {
        $this->image = $image;
        $this->ref = $ref;
        $this->name = $name;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.product-item');
    }
}
