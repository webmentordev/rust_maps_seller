<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Listing extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {

        return view('components.listing', [
            'maps' => Product::latest()->limit(9)->get()
        ]);
    }
}
