<?php
/* @var $this UtentesController */
/* @var $model Utentes */

$this->breadcrumbs = array(
    'Utentes' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Utentes', 'url' => array('index')),
    array('label' => 'Create Utentes', 'url' => array('create')),
    array('label' => 'View Utentes', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Utentes', 'url' => array('admin')),
);
?>

    <h1><?php echo $model->nome; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>


<script>
    $( document ).ready(function(){
        if($('#Utentes_nif').val()==0){
            $('#Utentes_nif').val('');
        }

    });
</script>