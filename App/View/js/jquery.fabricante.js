$("#formFabricante").submit((e) => {
    e.preventDefault();

    var fabricante = $("#fabricante");

    if(fabricante.val() == "") {
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
                fabricante: fabricante.val().toUpperCase()
            },
            success: ((result) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Fabricante Cadastrado!',
                });

                fabricante.val("");
            }),
            error: ((result) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro ao Cadastrar!',
                    text: 'Ocorreu um erro inesperado ao tentar cadastrar um fabricante, tente novamente mais tarde.'
                });
            })
        });
    }
});