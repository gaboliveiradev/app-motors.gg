$("#formFabricante").submit((e) => {
    e.preventDefault();

    alert($("#fabricante").val());

    /*$.ajax({
        url: '/combustivel/salvar',
        method: 'POST',
        dataType: 'json',
        data: {
            descricao: $("#fabricante").val()
        },
        success: ((result) => {
            alert(`SUCCESS: ${result.response_data}`);
        }),
        error: ((result) => {
            alert(`ERRO: ${result.response_data}`);
        })
    });*/
});