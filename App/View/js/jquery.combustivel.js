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
            var tbody = $("#body__table");
            var indiceJson = Object.keys(result.response_data).length;
            
            for(var i = 0; i < indiceJson; i++) {
                var tr = $(`<tr>
                    <td id="id">${result.response_data[i].id}</td>
                    <td id="nome">${result.response_data[i].descricao}</td>
                    <td id="cadastrado_em">${result.response_data[i].data_cadastro}</td>
                    <td id="atualizado_em">${result.response_data[i].data_atualizado}</td>
                    <td id="operador">${result.response_data[i].operador}</td>
                </tr>`);

                tbody.append(tr);
            }
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