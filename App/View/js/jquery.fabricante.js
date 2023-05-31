$("#formFabricante").submit((e) => {
    e.preventDefault();

    var fabricante = $("#fabricante").val();

    if(fabricante == "") {
        Swal.fire({
            icon: 'error',
            title: 'Campos Vazios!',
        });
    } else {
        $.ajax({
            url: '/fabricante/salvar',
            method: 'POST',
            dataType: 'json',
            data: {
                fabricante: fabricante.toUpperCase()
            },
            success: ((result) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Fabricante Cadastrado!',
                });
            }),
            error: ((result) => {
                alert(`ERRO: ${result.response_data}`);
            })
        });
    }
});