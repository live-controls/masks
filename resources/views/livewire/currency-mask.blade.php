<div>
    <input
        id="{{ $maskId }}"
        name="{{ $maskName }}"
        type="text"
        class="{{ $class }}"
        wire:model.debounce.500ms='maskedValue'
        @if($required) required @endif
    />
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
                        thousandsSeparator: '.',
                        radix: ',',
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

        window.addEventListener('{{ $maskId }}-valueUpdated', event => {
            @this.value = window.{{ $maskId }}mask.unmaskedValue;
        });
    </script>

</div>
