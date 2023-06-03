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
                getAll();
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

$(document).ready((e) => {
    getAll();
});

function getAll() {
    $.ajax({
        url: '/get/all/fabricante',
        method: 'POST',
        dataType: 'json',
        success: ((result) => {
            var tbody = $("#body__table");
            var indiceJson = Object.keys(result.response_data).length;

            tbody.empty();
            
            for(var i = 0; i < indiceJson; i++) {
                var data_hora_cadastrado = (result.response_data[i].data_atualizado == null) ? `${result.response_data[i].data_cadastro} às ${result.response_data[i].hora_cadastro}` : result.response_data[i].data_atualizado;

                var tr = $(`<tr>
                    <td class="id text-center">${result.response_data[i].id}</td>
                    <td class="nome">${result.response_data[i].descricao}</td>
                    <td class="operador">${result.response_data[i].operador}</td>
                    <td class="cadastrado_em">${result.response_data[i].data_cadastro} às ${result.response_data[i].hora_cadastro}</td>
                    <td class="atualizado_em">${data_hora_cadastrado}</td>
                    <td id="${result.response_data[i].id}" class="editar text-center"><a href=""><i class="bi bi-pencil-square"></i></a></td>
                    <td id="${result.response_data[i].id}" class="deletar text-center"><a href=""><i class="bi bi-trash3-fill"></i></a></td>
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
}