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

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            array('actividade, idade, pesoAtual,altura, pesoAcordado,neds,passo', 'required'),

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
        );
    }
} 