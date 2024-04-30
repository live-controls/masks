<div>
    <input
        id="{{ $maskId }}"
        name="{{ $maskName }}"
        type="text"
        class="{{ $class }}"
        wire:model.live='maskedValue'
        @if($required) required @endif
    />

    @if(!is_null($unmaskedId))
        <input
            id="{{ $unmaskedId }}"
            name="{{ $unmaskedId }}"
            type="hidden"
            wire:model.live='value'
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
            document.getElementById('{{ $unmaskedId }}').value = window.{{ $maskId }}mask.unmaskedValue;
        });
    </script>
    @endscript
</div>
