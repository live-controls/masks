<?php

namespace LiveControls\Masks\Http\Livewire;

use Livewire\Component;

class MaskComponent extends Component
{
    public $maskId = 'value';
    public $maskName = 'value';

    public $unmaskedId;
    public $unmaskedName;

    public $class = 'input input-bordered w-full';

    public $required = false;

    public $value;
    public $maskedValue;

    public function mount(){
        $this->dispatch($this->maskId.'-contentInitialized');
    }

    public function updatedMaskedValue($value)
    {
        $this->dispatch($this->maskId.'-valueUpdated', value: $value);
    }
}
