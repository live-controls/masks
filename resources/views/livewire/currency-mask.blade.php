<div>
    <script type="text/javascript">
        window.{{ $id }}mask = IMask(
            document.getElementById('{{ $id }}'),
            {
                mask: '$num',
                blocks: {
                    num: {
                        mask: Number,
                        scale: 2,
                        padFractionalZeros: true,
                        thousandsSeparator: '.',
                        radix: ',',
                        mapToRadix: []
                    }
                }
            }
        );

        document.addEventListener("DOMContentLoaded", () => {
            @if(!is_null($value))
                window.{{ $id }}mask.value = "{{ $value }}";
            @endif
        });

        Livewire.on('{{ $id }}-valueUpdated', value => {
            @this.value = window.{{ $id }}mask.unmaskedValue;
        });
    </script>

    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="text"
        class="{{ $class }}"
        wire:model.debounce.250ms='maskedValue'
        @if($required) required @endif
    />
</div>