<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    protected $value;

    /**
     * Create a new component instance.
     *
     * @param string $value
     */
    public function __construct($value='')
    {
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        $value = $this->value;
        return view('components.textarea', compact('value'));
    }
}
