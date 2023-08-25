<?php

namespace LiveControls\Masks\Http\Livewire;

use Livewire\Component;

class MaskComponent extends Component
{
    public $maskId = 'value';
    public $maskName = 'value';

    public $class = 'input input-bordered w-full';

    public $required = false;

    public $value;
    public $maskedValue;


    public function updatedMaskedValue($value)
    {
        $this->dispatchBrowserEvent($this->maskId.'-valueUpdated', ['value' => $value]);
    }
}
