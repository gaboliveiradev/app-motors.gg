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
                getAll();
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

function getAll() {
    $.ajax({
        url: '/get/all/combustivel',
        method: 'POST',
        dataType: 'json',
        success: ((result) => {
            var tbody = $("#body__table");
            var indiceJson = Object.keys(result.response_data).length;

            tbody.empty();

            if(indiceJson != 0) {
                for(var i = 0; i < indiceJson; i++) {
                    var data_hora_cadastrado = (result.response_data[i].data_atualizado == null) ? `${result.response_data[i].data_cadastro} às ${result.response_data[i].hora_cadastro}` : result.response_data[i].data_atualizado;
    
                    var tr = $(`<tr>
                        <td class="id text-center">${result.response_data[i].id}</td>
                        <td class="nome">${result.response_data[i].descricao}</td>
                        <td class="operador">${result.response_data[i].operador}</td>
                        <td class="cadastrado_em">${result.response_data[i].data_cadastro} às ${result.response_data[i].hora_cadastro}</td>
                        <td class="atualizado_em">${data_hora_cadastrado}</td>
                        <td class="text-center"><a class="editar" id="${result.response_data[i].id}"><i class="bi bi-pencil-square"></i></a></td>
                        <td class="text-center"><a class="deletar" id="${result.response_data[i].id}"><i class="bi bi-trash3-fill"></i></a></td>
                    </tr>`);
    
                    tbody.append(tr);
                }
            } else {
                var tr = $(`<tr>
                    <td colspan="6" class="text-center">NENHUM REGISTRO</td>
                </tr>`);

                tbody.append(tr);
            }
        }),
        error: ((result) => {
            Swal.fire({
                icon: 'error',
                title: 'Erro ao Carregar Dados!',
                text: 'Ocorreu um erro inesperado ao tentar carregar os dados da tabela, tente novamente mais tarde.'
            });
        })
    });
}

function updateById(id) {

}

function deleteById(id) {
    $.ajax({
        url: `/combustivel/deletar?id=${id}`,
        method: 'GET',
        dataType: 'json',
        success: ((result) => {
            if(result.response_data == false) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro ao Deletar!',
                    text: 'Atualize a página e tente novamente. Se o erro persistir, contate o desenvolvedor.'
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Combustível Deletado!',
                });
    
                getAll();
            }
        }),
        error: ((result) => {
            Swal.fire({
                icon: 'error',
                title: 'Erro ao Deletar!',
                text: 'Ocorreu um erro inesperado ao tentar deletar um combustível, tente novamente mais tarde.'
            });
        })
    });
}

$(document).ready((e) => {
    getAll();

    $(document).on('click', '.editar', function() {
        updateById(this.id);
    });
    
    $(document).on('click', '.deletar', function() {
        deleteById(this.id);
    });
});