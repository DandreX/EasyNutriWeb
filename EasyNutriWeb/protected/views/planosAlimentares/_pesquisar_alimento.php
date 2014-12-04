<?php
/* @var $model Alimentos */
/* @var $query string */
?>
<?php echo TbHtml::textField('pesquisa', $query, array(
    'id'=>'queryAlimento',
    'placeholder' => 'Insira alimento...')); ?>
<?php echo TbHtml::button('Pesquisar', array('id' => 'btnQuery')); ?>

<?php

foreach($model as $a){
    echo('<p>'.$a->nome.' </p><br>');
}

?>


