/**
 * Contem funcoes de auxilio ao formulario para criar um plano alimentar
 */

$( document ).ready(
    function(){

        //navegacao (butoes proximo e anterior)
        $('#btnAnterior').click(function(){
            var atual = $('#passoAtual').val();
            $('#irPara').val(atual-1);
            $('#btnSubmeter').click();
        });

        //desativar form submit ao presionar a tecla enter
        $('#formPlanoAlimentar').not($('form.form-inline')).on("keyup keypress", function(e) {
            var code = e.keyCode || e.which;

            if (code  == 13 ) {
                console.log(e)
                e.preventDefault();
                console.log("prevente submit");
                return false;
            }
        });

    }
);
