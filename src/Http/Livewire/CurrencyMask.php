<?php

namespace LiveControls\Masks\Http\Livewire;

class CurrencyMask extends MaskComponent
{
    public string $id = 'value';
    public string $name = 'value';

    public string $class = 'input input-bordered w-full';

    public bool $required = false;
    
    public $value;
    public $maskedValue;

    public function render()
    {
        return view('livecontrols-masks::livewire.currency-mask');
    }

    public function updatedMaskedValue($value)
    {
        $this->emit($this->id.'-valueUpdated', ['value' => $value]);
    }
}
