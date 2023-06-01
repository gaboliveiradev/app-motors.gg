$("#formTipoVeiculo").submit((e) => {
    e.preventDefault();

    var tipo_veiculo = $("#tipoVeiculo");

    if(tipo_veiculo.val() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Campos Vazios!',
        });
    } else {
        $.ajax({
            url: '/tipo-veiculo/salvar',
            method: 'POST',
            dataType: 'json',
            data: {
                tipo_veiculo: tipo_veiculo.val()
            },
            success: ((result) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Tipo Veículo Cadastrado!',
                });

                tipo_veiculo.val("");
            }),
            error: ((result) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro ao Cadastrar!',
                    text: 'Ocorreu um erro inesperado ao tentar cadastrar um tipo de veículo, tente novamente mais tarde.'
                });
            })
        });
    }
});