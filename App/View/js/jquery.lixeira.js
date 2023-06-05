function loadCombustivel() {
    $.ajax({
        url: '/get/all/combustivel?ativo=0',
        method: 'POST',
        dataType: 'json',
        success: ((result) => {
            var tbody = $("#body__table");
            var indiceJson = Object.keys(result.response_data).length;

            tbody.empty();

            if(indiceJson != 0) {
                for(var i = 0; i < indiceJson; i++) {
                    var data_hora_cadastrado = (result.response_data[i].data_atualizado == null) ? `${result.response_data[i].data_cadastro} às ${result.response_data[i].hora_cadastro}` : `${result.response_data[i].data_atualizado} às ${result.response_data[i].hora_atualizado}`;
    
                    var tr = $(`<tr>
                        <td class="id text-center">${result.response_data[i].id}</td>
                        <td class="nome">${result.response_data[i].descricao}</td>
                        <td class="operador">${result.response_data[i].operador}</td>
                        <td class="cadastrado_em">${result.response_data[i].data_cadastro} às ${result.response_data[i].hora_cadastro}</td>
                        <td class="atualizado_em">${data_hora_cadastrado}</td>
                        <td class="text-center"><a class="restaurar" id="${result.response_data[i].id}"><i class="bi bi-arrow-up-square-fill"></i></a></td>
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

function loadFabricante() {
    $.ajax({
        url: '/get/all/fabricante?ativo=0',
        method: 'POST',
        dataType: 'json',
        success: ((result) => {
            var tbody = $("#body__table");
            var indiceJson = Object.keys(result.response_data).length;

            tbody.empty();
            
            if(indiceJson != 0) {
                for(var i = 0; i < indiceJson; i++) {
                    var data_hora_cadastrado = (result.response_data[i].data_atualizado == null) ? `${result.response_data[i].data_cadastro} às ${result.response_data[i].hora_cadastro}` : `${result.response_data[i].data_atualizado} às ${result.response_data[i].hora_atualizado}`;
    
                    var tr = $(`<tr>
                        <td class="id text-center">${result.response_data[i].id}</td>
                        <td class="nome">${result.response_data[i].descricao}</td>
                        <td class="operador">${result.response_data[i].operador}</td>
                        <td class="cadastrado_em">${result.response_data[i].data_cadastro} às ${result.response_data[i].hora_cadastro}</td>
                        <td class="atualizado_em">${data_hora_cadastrado}</td>
                        <td class="text-center"><a class="restaurar" id="${result.response_data[i].id}"><i class="bi bi-arrow-up-square-fill"></i></a></td>
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

function loadMarca() {
    $.ajax({
        url: '/get/all/marca?ativo=0',
        method: 'POST',
        dataType: 'json',
        success: ((result) => {
            var tbody = $("#body__table");
            var indiceJson = Object.keys(result.response_data).length;

            tbody.empty();
            
            if(indiceJson != 0) {
                for(var i = 0; i < indiceJson; i++) {
                    var data_hora_cadastrado = (result.response_data[i].data_atualizado == null) ? `${result.response_data[i].data_cadastro} às ${result.response_data[i].hora_cadastro}` : `${result.response_data[i].data_atualizado} às ${result.response_data[i].hora_atualizado}`;
    
                    var tr = $(`<tr>
                        <td class="id text-center">${result.response_data[i].id}</td>
                        <td class="nome">${result.response_data[i].descricao}</td>
                        <td class="operador">${result.response_data[i].operador}</td>
                        <td class="cadastrado_em">${result.response_data[i].data_cadastro} às ${result.response_data[i].hora_cadastro}</td>
                        <td class="atualizado_em">${data_hora_cadastrado}</td>
                        <td class="text-center"><a class="restaurar" id="${result.response_data[i].id}"><i class="bi bi-arrow-up-square-fill"></i></a></td>
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

function loadTipoVeiculo() {
    $.ajax({
        url: '/get/all/tipo-veiculo?ativo=0',
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
                        <td class="text-center"><a class="restaurar" id="${result.response_data[i].id}"><i class="bi bi-arrow-up-square-fill"></i></a></td>
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
                title: 'Erro ao Cadastrar!',
                text: 'Ocorreu um erro inesperado ao tentar carregar os dados da tabela, tente novamente mais tarde.'
            });
        })
    });
}

function loadVeiculo() {
    var tableHead = $("#head__table");
    var tableBody = $("#body__table");

    tableHead.empty();
    tableBody.empty();

    var th = $(`<tr>
        <th scope="col" class="text-center">ID</th>
        <th scope="col" class="text-center">MODELO</th>
        <th scope="col" class="text-center">ANO</th>
        <th scope="col" class="text-center">NUM CHASSI</th>
        <th scope="col" class="text-center">PLACA</th>
        <th scope="col" class="text-center">CADASTRADO EM</th>
        <th scope="col" class="text-center">DELETADO EM</th>
        <th scope="col" class="text-center">OPERADOR</th>
        <th scope="col" colspan="2" class="text-center w-30">AÇÃO</th>
    </tr>`);

    tableHead.append(th);
}

$(document).ready(function() {
    loadCombustivel();

    $("#selectFiltro").change(function() {
        switch($(this).val()) {
            case "combustivel":
                loadCombustivel();
            break;

            case "fabricante":
                loadFabricante();
            break;

            case "marca":
                loadMarca();
            break;

            case "tipo":
                loadTipoVeiculo();
            break;

            case "veiculo":
                loadVeiculo();
            break;

            default:
                loadCombustivel();
            break;
        }
    });
});