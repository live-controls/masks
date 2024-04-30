<div>
    <input
        id="{{ $maskId }}"
        name="{{ $maskName }}"
        type="text"
        class="{{ $class }}"
        wire:model.live.debounce.500ms='maskedValue'
        @if($required) required @endif
    />

    @if(!is_null($unmaskedId))
        <input
            id="{{ $unmaskedId }}"
            name="{{ $unmaskedId }}"
            type="hidden"
            class="{{ $class }}"
            wire:model="value"
        />
    @endif

    @script
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

        window.addEventListener('{{ $maskId }}-valueUpdated', event => {
            @this.value = window.{{ $maskId }}mask.unmaskedValue;
        });
    </script>
    @endscript
</div>
