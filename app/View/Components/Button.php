<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $attributes;
    /**
     * Create a new component instance.
     */
    public function __construct($type = 'primary', $attributes = [])
    {
        $this->type = $type;
        $this->attributes = $attributes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }

    public function getClasses()
    {
        $baseClasses = 'font-medium py-2 px-4 rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ';

        switch ($this->type) {
            case 'secondary':
                return $baseClasses . 'bg-amber-500 text-white hover:bg-amber-600 focus:ring-amber-500';
            case 'danger':
                return $baseClasses . 'bg-red-500 text-white hover:bg-red-600 focus:ring-red-500';
            case 'primary':
            default:
                return $baseClasses . 'bg-blue-500 text-white hover:bg-blue-600 focus:ring-blue-500';
        }
    }
}
