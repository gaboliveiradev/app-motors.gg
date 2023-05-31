$("#formCombustivel").submit((e) => {
    e.preventDefault();

    var combu = $("#combustivel").val();

    if(combu == "") {
        Swal.fire({
            icon: 'error',
            title: 'Campos Vazios!',
        });
    } else {
        $.ajax({
            url: '/combustivel/salvar',
            method: 'POST',
            dataType: 'json',
            data: {
                combustivel: combu.toUpperCase()
            },
            success: ((result) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Combustível Cadastrado!',
                });
            }),
            error: ((result) => {
                alert(`ERRO: ${result.response_data}`);
            })
        });
    }
});