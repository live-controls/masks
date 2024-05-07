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

    public $updateCallName;


    public function mount(){
        $this->dispatch($this->maskId.'-contentInitialized');

        if(is_null($this->updateCallName)){
            $this->updateCallName = $this->maskId.'-valueUpdated';
        }
    }

    public function updatedMaskedValue($value)
    {
        $this->dispatch($this->updateCallName, value: $value);
    }

    public function updatedValue($value)
    {
        $this->dispatch($this->maskId.'-unmaskedUpdate', value: $value);
    }
}
