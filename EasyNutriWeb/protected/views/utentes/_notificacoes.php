<?php
/* @var $dpNotificacoes CActiveDataProvider */

?>
<!---->
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dpNotificacoes,
    'itemView' => '_view_notificacoes',
    'sortableAttributes' => array('data'),
)); ?>
