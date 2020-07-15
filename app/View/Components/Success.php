<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Success extends Component
{
    /**
     * The success message.
     *
     * @var string
     */
    public $successText;
    /**
     * Create a new component instance.
     *
     * @param  string  $successText
     * @return void
     */
    public function __construct($successText = '')
    {
        $this->successText = $successText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.success');
    }
}
