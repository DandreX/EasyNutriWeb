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

        //Prevenir nagevagacao nao autorizada
        var canChangePage = false;

        window.onbeforeunload = function(event){
            if (!canChangePage) {
                return 'Ao sair desta pagina o plano alimentar pode ser perdido. Para navegar entre passos por' +
                    ' favor utilize os botões "Anterior" e "Próximo"';
            }else{
                event.preventDefault();
            }

        };

        $('#btnAnterior, #btnSubmeter').click(function(){
            canChangePage=true;
        });
        //END Prevenir nagevagacao nao autorizada

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
