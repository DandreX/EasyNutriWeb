<?php
/* @var $this UtentesController */
/* @var $model Utentes */

//$this->breadcrumbs=array(
//	'Utentes'=>array('index'),
//	'Create',
//);

$this->menu = array(
    //array('label'=>'List Utentes', 'url'=>array('index')),
    array('label' => 'Meus Utentes', 'url' => array('admin')),
    array('label' => 'Novo Utente', 'url' => '#', 'active' => true),
);
?>

    <h1>Novo Utente</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>

<script type="text/javascript">
    $( document ).ready(function(){
        var nomeCompleto;
        var login;
        $('input#textNome').change(function(){
            nomeCompleto =$(this).val();
            login = nomeCompleto.split(" ")[0];
            $('#Utentes_username').val(login);

        });
    });

</script>