<h2>Detalhes</h2>
<?php
echo TbHtml::formActions(array(
    TbHtml::inlineCheckBoxList('Checkbox', '', array(
        'option1' => 'Calorias',
        'option2' => 'Proteinas',
        'option3' => 'Hidratos de Carbono',
        'option4' => 'Lipidos',
        'option5' => 'Açúcares',
        'option6' => 'Fibras'
    ))
));

?>
