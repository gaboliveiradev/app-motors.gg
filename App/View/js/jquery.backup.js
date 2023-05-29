$('#exportar').click((e) => {
    e.preventDefault();

    $.ajax({
        url: '/exportar',
        method: 'POST',
        dataType: 'json',
        success: ((result) => {
            if(result.response_data == true) {
                alert('Dados Exportados Corretamente.');
            }
        }),
        error: ((result) => {
            alert(`ERRO: ${result.response_data}`);
        })
    });
});