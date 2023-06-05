var btn_cadastrar = $("#cadastrar");
var btn_atualizar = $("#atualizar");

function loadCombustivel() {
    $.ajax({
        url: "/get/all/combustivel",
        dataType: 'json',
        success: function (result) {
            var select = $("#selectCombustivel");
            var indiceJson = Object.keys(result.response_data).length;
            
            for(var i = 0; i < indiceJson; i++) {
                var option = $("<option></option>");

                option.val(result.response_data[i].id);
                option.text(result.response_data[i].descricao);

                select.append(option);
            }
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadFabricante() {
    $.ajax({
        url: "/get/all/fabricante",
        dataType: 'json',
        success: function (result) {
            var select = $("#selectFabricante");
            var indiceJson = Object.keys(result.response_data).length;
            
            for(var i = 0; i < indiceJson; i++) {
                var option = $("<option></option>");

                option.val(result.response_data[i].id);
                option.text(result.response_data[i].descricao);

                select.append(option);
            }
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadMarca() {
    $.ajax({
        url: "/get/all/marca",
        dataType: 'json',
        success: function (result) {
            var select = $("#selectMarca");
            var indiceJson = Object.keys(result.response_data).length;
            
            for(var i = 0; i < indiceJson; i++) {
                var option = $("<option></option>");

                option.val(result.response_data[i].id);
                option.text(result.response_data[i].descricao);

                select.append(option);
            }
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function loadTipoVeiculo() {
    $.ajax({
        url: "/get/all/tipo-veiculo",
        dataType: 'json',
        success: function (result) {
            var select = $("#selectTipoVeiculo");
            var indiceJson = Object.keys(result.response_data).length;
            
            for(var i = 0; i < indiceJson; i++) {
                var option = $("<option></option>");

                option.val(result.response_data[i].id);
                option.text(result.response_data[i].descricao);

                select.append(option);
            }
        },
        error: function (result) {
            console.log(result)
        }
    });
}

function insert(id = null) {
    var modelo = $("#modelo").val();
    var ano = $("#ano").val();
    var cor = $("#cor").val();
    var chassi = $("#chassi").val();
    var placa = $("#placa").val();
    var quilometragem = $("#quilometragem").val();
    var observacao = $("#observacao").val();
    var idCombustivel = $("#selectCombustivel").val();
    var idFabricante = $("#selectFabricante").val();
    var idMarca = $("#selectMarca").val();
    var idTipoVeiculo = $("#selectTipoVeiculo").val();
    var revisao = ($('#revisao').is(':checked')) ? 1 : 0;
    var venda = ($('#venda').is(':checked')) ? 1 : 0;
    var aluguel = ($('#aluguel').is(':checked')) ? 1 : 0;
    var roubo_furto = ($('#roubo_furto').is(':checked')) ? 1 : 0;
    var particular = ($('#particular').is(':checked')) ? 1 : 0;
    var sinistrado = ($('#sinistrado').is(':checked')) ? 1 : 0;

    if(modelo == "" || ano == "" || cor == "" || chassi == "" || placa == "" || quilometragem == "" || idCombustivel == "" || idFabricante == "" || idMarca == "" || idTipoVeiculo == "") {
        Swal.fire({
            icon: 'error',
            title: 'Campos Vazios!',
        });
    } else {
        $.ajax({
            url: '/veiculo/salvar',
            method: 'POST',
            dataType: 'json',
            data: {
                id: id,
                modelo: modelo.toUpperCase(),
                ano: ano,
                cor: cor.toUpperCase(),
                chassi: chassi,
                placa: placa,
                quilometragem: quilometragem,
                observacao: observacao.toUpperCase(),
                idCombustivel: idCombustivel,
                idFabricante: idFabricante,
                idMarca: idMarca,
                idTipoVeiculo: idTipoVeiculo,
                revisao: revisao,
                venda: venda,
                aluguel: aluguel,
                roubo_furto: roubo_furto,
                particular: particular,
                sinistrado: sinistrado
            },
            success: ((result) => {

                if(result.response_data == true) {
                    Swal.fire({
                        icon: 'success',
                        title: "Veículo Cadastrado!",
                        confirmButtonText: 'OK',
                    }).then((e) => {
                        if (e.isConfirmed) window.location.reload(true);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: "Erro ao Cadastrar!",
                        confirmButtonText: 'OK',
                    }).then((e) => {
                        if (e.isConfirmed) window.location.reload(true);
                    });
                }

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
}

function getAll() {
    $.ajax({
        url: '/get/all/veiculo',
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
                        <td class="modelo">${result.response_data[i].modelo}</td>
                        <td class="ano">${result.response_data[i].ano}</td>
                        <td class="chassi">${result.response_data[i].num_chassi}</td>
                        <td class="placa">${result.response_data[i].placa}</td>
                        <td class="cadastrado_em">${result.response_data[i].data_cadastro} às ${result.response_data[i].hora_cadastro}</td>
                        <td class="atualizado_em">${data_hora_cadastrado}</td>
                        <td class="operador">${result.response_data[i].nome}</td>
                        <td class="text-center"><a class="editar" id="${result.response_data[i].id}"><i class="bi bi-pencil-square"></i></a></td>
                        <td class="text-center"><a class="deletar" id="${result.response_data[i].id}"><i class="bi bi-trash3-fill"></i></a></td>
                    </tr>`);
    
                    tbody.append(tr);
                }
            } else {
                var tr = $(`<tr>
                    <td colspan="10" class="text-center">NENHUM REGISTRO</td>
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

function deleteById(id) {
    $.ajax({
        url: `/veiculo/deletar?id=${id}`,
        method: 'GET',
        dataType: 'json',
        success: ((result) => {
            if(result.response_data == false) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro ao Deletar!',
                    text: 'Atualize a página e tente novamente. Se o erro persistir, contate-a central de atendimento e suporte Motors.GG.'
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Veículo Deletado!',
                });
    
                getAll();
            }
        }),
        error: ((result) => {
            Swal.fire({
                icon: 'error',
                title: 'Erro ao Deletar!',
                text: 'Ocorreu um erro inesperado ao tentar deletar um veículo, tente novamente mais tarde.'
            });
        })
    });
}

$(document).ready((e) => {
    loadCombustivel();
    loadFabricante();
    loadMarca();
    loadTipoVeiculo();

    getAll();

    $("#cadastrar").click((e) => {
        e.preventDefault();
        insert();
    });

    $(document).on('click', '.deletar', function() {
        deleteById(this.id);
    });
});