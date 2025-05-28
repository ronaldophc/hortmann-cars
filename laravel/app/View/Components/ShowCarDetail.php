<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowCarDetail extends Component
{

    public function __construct(
        public string $name,
        public ?string $value
    )
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.show-car-detail');
    }
}
