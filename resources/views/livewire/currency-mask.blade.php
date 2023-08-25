<div>
    <script type="text/javascript">
        window.{{ $maskId }}mask = IMask(
            document.getElementById('{{ $maskId }}'),
            {
                mask: '{{ $currencyString }}num',
                blocks: {
                    num: {
                        mask: Number,
                        scale: 2,
                        padFractionalZeros: true,
                        thousandsSeparator: ',',
                        radix: '.',
                        mapToRadix: []
                    }
                }
            }
        );

        document.addEventListener("DOMContentLoaded", () => {
            @if(!is_null($value))
                window.{{ $maskId }}mask.value = "{{ $value }}";
            @endif
        });

        Livewire.on('{{ $maskId }}-valueUpdated', value => {
            @this.value = window.{{ $maskId }}mask.unmaskedValue;
        });
    </script>

    <input
        id="{{ $maskId }}"
        name="{{ $maskName }}"
        type="text"
        class="{{ $class }}"
        wire:model.debounce.250ms='maskedValue'
        @if($required) required @endif
    />
</div>