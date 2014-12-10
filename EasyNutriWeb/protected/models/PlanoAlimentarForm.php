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
        array('id' => 1, 'refeicao' => 'Pequeno-Almoço', 'hora' => '09:00', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '', 'suplementosA' => '', 'carne' => '', 'gordura' => ''),
        array('id' => 2, 'refeicao' => 'Meio da manhã', 'hora' => '11h00', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '', 'suplementosA' => '', 'carne' => '', 'gordura' => ''),
        array('id' => 3, 'refeicao' => 'Almoço', 'hora' => '13h30', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '', 'suplementosA' => '', 'carne' => '', 'gordura' => ''),
        array('id' => 4, 'refeicao' => 'Meio da tarde', 'hora' => '16h30', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '', 'suplementosA' => '', 'carne' => '', 'gordura' => ''),
        array('id' => 5, 'refeicao' => 'Jantar', 'hora' => '20h00', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '', 'suplementosA' => '', 'carne' => '', 'gordura' => ''),
        array('id' => 6, 'refeicao' => 'Ceia', 'hora' => '23h30', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '', 'suplementosA' => '', 'carne' => '', 'gordura' => ''),
        array('id' => 7, 'refeicao' => 'Total', 'hora' => '', 'leiteMG' => '', 'vegB' => '', 'fruta' => '', 'pao' => '', 'suplementosA' => '', 'carne' => '', 'gordura' => '')
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
        1 => '9:00',
        2 => '11:00',
        3 => '13:30',
        4 => '16:30',
        5 => '20:00',
        6 => '23:30',
    );
    public $doses = array(
        'leite' => 0,
        'vegB' => 0,
        'fruta' => 0,
        'pao' => 0,
        'supa' => 0,
        'carne' => 0,
        'gordura' => 0,
    );
    public $restricaoNeds;

    public $batatas = 'batata frita';
    public $plano;
    public $prescricao;
    public $verEquivalencias;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(

            array('actividade, pesoAtual,altura, pesoAcordado, neds', 'required'),
            array('pesoAtual,altura, pesoAcordado, neds, restricaoNeds', 'numerical'),
            array('restricaoNeds, utenteId,utenteNome,
             sexo,idade, doses, plano, prescricao,verEquivalencias, horasRefeicao', 'safe'),
            array('plano', 'required', 'on' => 'step4'),
            array('plano', 'planoValido', 'on' => 'step4')

        );
    }


    public function planoValido($attribute, $params)
    {
        try {
            if (!empty($this->plano)) {
                foreach ($this->plano as $refeicaoPlano) {
                    foreach ($refeicaoPlano as $linhaRefeicao) {

                        if (isset($linhaRefeicao['quant'])
                            && isset($linhaRefeicao['unidade'])
                            && isset($linhaRefeicao['alimento'])
                        ) {
                            if (!$linhaRefeicao["quant"] && !$linhaRefeicao["unidade"] && !$linhaRefeicao["alimento"]) {
                                $this->addError($attribute, "Existem campos por preencher");
                                return;
                            } elseif (!is_numeric($linhaRefeicao['quant'])
                                || $linhaRefeicao['quant'] <= 0
                                || $linhaRefeicao['quant'] == ''
                            ) {
                                $this->addError($attribute, "Defina a quantidade" . print_r($linhaRefeicao, true));
                                return;
                            }
                        } else {
                            $this->addError($attribute, "Existem campos por definir".print_r($linhaRefeicao,true));
                            return;
                        }
                    }
                }
            } else {
                $this->addError($attribute, 'Plano Alimentar está vazio');
            }
        } catch (Exception $e) {
            $this->addError($attribute, 'Erro inexperado:' . $e->getMessage());
        }
        //$this->addError($attribute, 'Teste auto fail');


    }

    public function guardarPlanoAlimentar()
    {
        ChromePhp::log(print_r($this->plano, true));
        $transaction = Yii::app()->db->beginTransaction();
        try {
            $planoAlimentar = new PlanosAlimentares();
            $planoAlimentar->data_presc = date("Y-m-d H:i:s");
            $planoAlimentar->id_medico = Yii::app()->user->userid;
            $planoAlimentar->id_utente = $this->utenteId;
            $planoAlimentar->ned = $this->neds;
            $planoAlimentar->prescricao_dietetica = $this->prescricao;
            $planoAlimentar->apresentaTabela = $this->verEquivalencias;

            if ($planoAlimentar->save()) {
                // ChromePhp::log(print_r($planoAlimentar, true));
                foreach ($this->plano as $index => $refeicoes) {
                    foreach ($refeicoes as $linhaRefeicao) {
                        $linhaPlano = new LinhasPlano();
                        $linhaPlano->id_plano = $planoAlimentar->Id;
                        $linhaPlano->id_tipo_refeicao = $index;
                        $linhaPlano->hora = $this->horasRefeicao[$index];
                        //ChromePhp::log(print_r($linhaPlano, true));
                        if (isset($linhaRefeicao['id'])) {
                            $linhaPlano->id_alimento = $linhaRefeicao['id'];
                            $linhaPlano->id_porcao = $linhaRefeicao['unidade'];
                        } else {

                        }
                        $linhaPlano->quant = $linhaRefeicao['quant'];
                        $linhaPlano->descricao = $this->gerarDescricaoLinhaPlano($linhaRefeicao);
                        if (!$linhaPlano->save()) {
                            throw new Exception("Error on save linha");
                        }
                    }
                }
            } else {
                throw new Exception("Error on save plano");
            }

            $transaction->commit();
            return $planoAlimentar;
        } catch (Exception $e) {
            $transaction->rollback();
            $this->addError('plano', $e->getMessage());
        }

        return null;
    }

    private function gerarDescricaoLinhaPlano($linhaRefeicao)
    {
        if (isset($linhaRefeicao['id'])) {
            $desc = $linhaRefeicao['quant'] . ' ' . $linhaRefeicao['unidade'] . ' ' . $linhaRefeicao['alimento'];
        } else {
            $desc = $linhaRefeicao['quant'] . ' ' . $linhaRefeicao['unidade'] . ' ' . $linhaRefeicao['alimento'];
        }
        return $desc;
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
            'restricaoNeds' => 'Restrição Energética',
            'prescricao'=>'Prescrição',
        );
    }


} 