<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 26-11-2014
 * Time: 10:55
 */

class PlanoAlimentarForm extends CFormModel {

    public $actividade;
    //valores predefinidos para a actividade fisica
    public $actividades = array(
        1=>'Sedentário',
        2=>'Pouco Ativo',
        3=>'Ativo',
        4=>'Muito Ativo'
    );
    public $idade;
    public $pesoAtual;
    public $altura;
    public $sexo;
    public $pesoAcordado;
    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            // name, email, subject and body are required
            array('actividade, idade, pesoAtual,altura, pesoAcordado', 'required'),

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
            'actividade'=>'Actividade Física',
            'idade'=>'Idade',
            'pesoAtual'=>'Peso Atual',
            'altura'=>'Altura',
            'pesoAcordado'=>'Peso Acordado',
        );
    }
} 