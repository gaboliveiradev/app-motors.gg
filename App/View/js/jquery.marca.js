$("#formMarca").submit((e) => {
    e.preventDefault();

    alert($("#marca").val());

    /*$.ajax({
        url: '/marca/salvar',
        method: 'POST',
        dataType: 'json',
        data: {
            descricao: $("#marca").val()
        },
        success: ((result) => {
            alert(`SUCCESS: ${result.response_data}`);
        }),
        error: ((result) => {
            alert(`ERRO: ${result.response_data}`);
        })
    });*/
});