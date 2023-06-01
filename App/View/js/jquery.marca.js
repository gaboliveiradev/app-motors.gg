$("#formMarca").submit((e) => {
    e.preventDefault();

    var marca = $("#marca");

    if(marca.val() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Campos Vazios!',
        });
    } else {
        $.ajax({
            url: '/marca/salvar',
            method: 'POST',
            dataType: 'json',
            data: {
                marca: marca.val().toUpperCase()
            },
            success: ((result) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Marca Cadastrada!',
                });

                marca.val("");
            }),
            error: ((result) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro ao Cadastrar!',
                    text: 'Ocorreu um erro inesperado ao tentar cadastrar uma marca, tente novamente mais tarde.'
                });
            })
        });
    }
});