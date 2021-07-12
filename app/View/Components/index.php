<?php

namespace App\View\Components;
use App\Models\Product;
use Illuminate\View\Component;

class index extends Component
{
    public $products;
    public $links;
    public $is_daily;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($products = [], $isDaily = false, $links)
    {
        $this->products = $products;
        $this->is_daily = $isDaily;
        $this->links = $links;
        // $this->products = isset($products) ? $products : Product::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index');
    }
}
