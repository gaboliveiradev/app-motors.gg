$(document).ready((e) => {
    $('#placa').inputmask({
        mask: 'AAA-9999',
        placeholder: '___-____',
        clearMaskOnLostFocus: false
    });

    $('#chassi').inputmask({
        mask: '9{17}',
        placeholder: '',
        clearMaskOnLostFocus: false
    });

    $('#quilometragem').inputmask({
        alias: 'numeric',
        groupSeparator: ',',
        autoGroup: true,
        suffix: ' km',
        rightAlign: false,
        clearMaskOnLostFocus: false
    });

    $('#ano').inputmask({
        mask: '9999',
        placeholder: '',
        clearMaskOnLostFocus: false
      });
});