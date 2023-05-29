$("#formCombustivel").submit((e) => {
    e.preventDefault();

    alert($("#combustivel").val());

    /*$.ajax({
        url: '/combustivel/salvar',
        method: 'POST',
        dataType: 'json',
        data: {
            descricao: $("#combustivel").val()
        },
        success: ((result) => {
            alert(`SUCCESS: ${result.response_data}`);
        }),
        error: ((result) => {
            alert(`ERRO: ${result.response_data}`);
        })
    });*/
});