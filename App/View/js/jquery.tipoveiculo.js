$("#formTipoVeiculo").submit((e) => {
    e.preventDefault();

    alert($("#tipoVeiculo").val());

    /*$.ajax({
        url: '/combustivel/salvar',
        method: 'POST',
        dataType: 'json',
        data: {
            descricao: $("#tipoVeiculo").val()
        },
        success: ((result) => {
            alert(`SUCCESS: ${result.response_data}`);
        }),
        error: ((result) => {
            alert(`ERRO: ${result.response_data}`);
        })
    });*/
});