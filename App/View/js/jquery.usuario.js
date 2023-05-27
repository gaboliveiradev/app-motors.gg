$('#formLogin').submit((e) => {
    e.preventDefault();

    var remember = ($('#remember').is(':checked')) ? 'on' : 'off';

    $.ajax({
        url: '/login/autenticar',
        method: 'POST',
        data: {
            email: $('#email').val(),
            senha: $('#senha').val(),
            remember: remember
        },
        dataType: 'json',
        success: ((result) => {
            if (!jQuery.isEmptyObject(result.response_data[0])) {
                window.location.href = "/veiculo/form";
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Email e/ou Senha Incorretos;',
                });
            }
        }),
        error: ((result) => {
            console.log(`ERROR: ${result}`);
        })
    });
});

// Para utilizar no meu TCC
/*
$.ajax({
    url: '/veiculo/form',
    method: 'GET',
    success: function(response) {
      // Atualiza o conteúdo da página com a resposta recebida
      $('body').html(response);
    },
    error: function() {
      // Manipula erros, se houver
      alert('Erro ao carregar a página.');
    }
});
*/