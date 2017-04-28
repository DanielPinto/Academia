// Testando a validação usando jQuery
$(function(){

    // ## EXEMPLO 2
    // Aciona a validação ao sair do input
    $('.cpf_cnpj').blur(function(){

        // O CPF ou CNPJ
        var cpf_cnpj = $(this).val();
        var input = $(this);
        input.removeClass('valido');
        input.removeClass('invalido');
        // Testa a validação
        if ( ! valida_cpf_cnpj( cpf_cnpj ) ) {

            input.addClass('invalido');
            new PNotify({
                            title: 'Validação de CPF',
                            text: 'CPF inválido!',
                            type: 'worning',
                            hide: true,
                            styling: 'bootstrap3',
                            addclass: 'danger'
                        });
        }

    });

});
