<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;
use Symfony\Component\Intl\Countries;


class CountrySelect extends Component
{
    /**
     * Create a new component instance.
     */

    public $countries;
    public $selected;

    public function __construct($selected = null)
    {
        $this->countries = Countries::getNames(App::currentLocale());
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.country-select');
    }
}
