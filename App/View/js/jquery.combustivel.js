$("#formCombustivel").submit((e) => {
    e.preventDefault();

    var combu = $("#combustivel");

    if(combu.val() == "") {
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
                combustivel: combu.val().toUpperCase()
            },
            success: ((result) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Combustível Cadastrado!',
                });

                combu.val("");
            }),
            error: ((result) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro ao Cadastrar!',
                    text: 'Ocorreu um erro inesperado ao tentar cadastrar um combustível, tente novamente mais tarde.'
                });
            })
        });
    }
});

$(document).ready((e) => {
    $.ajax({
        url: '/get/all/combustivel',
        method: 'POST',
        dataType: 'json',
        success: ((result) => {
            alert("ok");
        }),
        error: ((result) => {
            Swal.fire({
                icon: 'error',
                title: 'Erro ao Cadastrar!',
                text: 'Ocorreu um erro inesperado ao tentar carregar os dados da tabela, tente novamente mais tarde.'
            });
        })
    });
});