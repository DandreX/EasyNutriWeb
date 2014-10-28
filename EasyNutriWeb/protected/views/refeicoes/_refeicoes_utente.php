<?php
/* @var $model Utente */
/* @var $refeicoes Refeicoes */
/*@var $data array*/
?>

<div id="refeicoes">
    <div id="refeicoes">
        <?php
        if ($dataProvider != null) {

            $this->widget('bootstrap.widgets.TbGridView', array(
                'id' => 'tabela_refeicoes',
                'dataProvider' => $dataProvider,
//                'filter'=> $dataProvider,
                'template' => "{items}",
                'selectableRows' => 1,
                'htmlOptions' => array('id' => 'tabela_refeicoes'),
                'columns' => array(
                    array('value' => '$data->id',
                        'header' => 'ID',
                    ),
                    array(
                        'value' => '$data->tipoRefeicao->descricao',
                        'header' => 'Refeição',
                    ),
                    array(
                        'name' => 'data_refeicao',
                        'header' => 'Data / Hora',
                    ),
                    array(
                        'class' => 'CCheckBoxColumn',
                    ),

                ),

            ));
        } else {
            echo("Este utente nao tem registos");
        }


        ?>

    </div>


</div>

<div id="detalhes_refeicao"></div>






