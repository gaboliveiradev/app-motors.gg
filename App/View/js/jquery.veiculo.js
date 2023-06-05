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
    
}

$(document).ready((e) => {
    loadCombustivel();
    loadFabricante();
    loadMarca();
    loadTipoVeiculo();

    $("#cadastrar").click((e) => {
        e.preventDefault();
        insert();
    });
});