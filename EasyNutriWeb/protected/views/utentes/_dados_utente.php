

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type' => TbHtml::DETAIL_TYPE_STRIPED,
    'data' => $model,
    'attributes' => array(
        'nome',
        'data_nascimento',
        'sexo',
        'estado_civil',
        'profissao',
        'morada',
        'username',
        'email',
        'telefone',
        'nif',
        'motivo_consulta',
    ),
));
?>