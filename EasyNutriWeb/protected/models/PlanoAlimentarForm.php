<?php

/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 26-11-2014
 * Time: 10:55
 */
class PlanoAlimentarForm extends CFormModel
{

    public static $tabelaDistribuicao = array(
        array('id' => 1, 'alimento' => 'Leite Gordo', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),
        array('id' => 2, 'alimento' => 'Leite Meio Gordo', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),
        array('id' => 3, 'alimento' => 'Leite Magro', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),
        array('id' => 4, 'alimento' => 'Vegetais B', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),
        array('id' => 5, 'alimento' => 'Fruta', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),
        array('id' => 6, 'alimento' => 'Subtotal', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),
        array('id' => 7, 'alimento' => 'Pão eq', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),
        array('id' => 8, 'alimento' => 'Suplementos A', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),
        array('id' => 9, 'alimento' => 'Subtotal', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),
        array('id' => 10, 'alimento' => 'Carne eq', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),
        array('id' => 11, 'alimento' => 'Subtotal', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),
        array('id' => 12, 'alimento' => 'Gordura', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),
        array('id' => 13, 'alimento' => 'Total', 'doses' => '', 'proteinas' => '', 'gordura' => '', 'hc' => '', 'calorias' => ''),

    );

    public static $tabelaQuantAlimentos = array(
        array('id' => 1, 'refeicao' => 'Pequeno-Almoço', 'hora' => '09:00', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '','suplementosA'=>'', 'carne' =>'', 'gordura' => ''),
        array('id' => 2, 'refeicao' => 'Meio da manhã', 'hora' => '11h00', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '', 'suplementosA'=>'','carne' => '', 'gordura' => ''),
        array('id' => 3, 'refeicao' => 'Almoço', 'hora' => '13h30', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '', 'suplementosA'=>'','carne' => '', 'gordura' => ''),
        array('id' => 4, 'refeicao' => 'Meio da tarde', 'hora' => '16h30', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '','suplementosA'=>'', 'carne' => '', 'gordura' => ''),
        array('id' => 5, 'refeicao' => 'Jantar', 'hora' => '20h00', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '', 'suplementosA'=>'','carne' => '', 'gordura' => ''),
        array('id' => 6, 'refeicao' => 'Ceia', 'hora' => '23h30', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '', 'suplementosA'=>'','carne' => '', 'gordura' => ''),
        array('id' => 7, 'refeicao' => 'Total', 'hora' => '', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '','suplementosA'=>'', 'carne' => '', 'gordura' => '')
    );

    public $utenteId;
    public $utenteNome;
    public $actividade;
    //valores predefinidos para a actividade fisica
    public $actividades = array(
        1 => 'Sedentário',
        2 => 'Pouco Ativo',
        3 => 'Ativo',
        4 => 'Muito Ativo'
    );
    public $idade;
    public $pesoAtual;
    public $altura;
    public $sexo;
    public $pesoAcordado;
    public $neds;
    public $passo;
    public $horasRefeicao = array(
        'Pequeno-Almoco'=>'9:00',
        'Meio da Manha'=>'11:00',
        'Almoco'=>'13:30',
        'Meio da Tarde'=>'16:30',
        'Jantar'=>'20:00',
        'Ceia'=>'23:30',
    );
    public $doses = array(
        'leite'=>0,
        'vegB'=>0,
        'fruta'=>0,
        'pao'=>0,
        'supa'=>0,
        'carne'=>0,
        'gordura'=>0,
    );
    public $restricaoNeds;

    public $batatas = 'batata frita';
    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(

            array('actividade, pesoAtual,altura, pesoAcordado, neds', 'required'),
            array('pesoAtual,altura, pesoAcordado, neds, restricaoNeds','numerical'),
            array('restricaoNeds, utenteId,utenteNome', 'safe'),

        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'actividade' => 'Actividade Física',
            'idade' => 'Idade',
            'pesoAtual' => 'Peso Atual',
            'altura' => 'Altura',
            'pesoAcordado' => 'Peso Acordado',
            'restricaoNeds' =>'Restrição Energética'
        );
    }


} 