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

    public static $dosesString = array(
        'leite' => "Leite",
        'vegB' => "Vegetais B",
        'fruta' => "Fruta",
        'pao' => "Pão",
        'supa' => "Suplementos A",
        'carne' => "Carne",
        'gordura' => "Gordura",
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

    /**
     *
     * @var array
     */
    public $distMacro = array(
        'proteinas'=>'',
        'lipidos'=>'',
        'hc'=>''
    );

    /**
     * Array dos totais de macronutrientes obtidos no passo 2 que vão ser distribuidos no passo 3
     * @var array
     */
    public $doses = array(
        'leite' => 0,
        'vegB' => 0,
        'fruta' => 0,
        'pao' => 0,
        'supa' => 0,
        'carne' => 0,
        'gordura' => 0,
    );

    /**
     * Array das doses de macronutrientes definidas no passo 3 para cada refeicão
     * @var array
     */
    public $dosesDistribuidas = array(
        1 => array(
            'leite' => 0,
            'vegB' => 0,
            'fruta' => 0,
            'pao' => 0,
            'supa' => 0,
            'carne' => 0,
            'gordura' => 0,
        ),
        2 => array(
            'leite' => 0,
            'vegB' => 0,
            'fruta' => 0,
            'pao' => 0,
            'supa' => 0,
            'carne' => 0,
            'gordura' => 0,
        ),
        3 => array(
            'leite' => 0,
            'vegB' => 0,
            'fruta' => 0,
            'pao' => 0,
            'supa' => 0,
            'carne' => 0,
            'gordura' => 0,
        ),
        4 => array(
            'leite' => 0,
            'vegB' => 0,
            'fruta' => 0,
            'pao' => 0,
            'supa' => 0,
            'carne' => 0,
            'gordura' => 0,
        ),
        5 => array(
            'leite' => 0,
            'vegB' => 0,
            'fruta' => 0,
            'pao' => 0,
            'supa' => 0,
            'carne' => 0,
            'gordura' => 0,
        ),
        6 => array(
            'leite' => 0,
            'vegB' => 0,
            'fruta' => 0,
            'pao' => 0,
            'supa' => 0,
            'carne' => 0,
            'gordura' => 0,
        ),
    );

    public $restricaoNeds;

    public $batatas = 'batata frita';

    public $tipoLeite;

    /**
     * Dados das linhas por refeicao do plano alimentar obtidos no passo 4
     * @var array
     */
    public $plano;

    public $prescricao;
    public $verEquivalencias;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(

            array('actividade, pesoAtual,altura, pesoAcordado, neds', 'required',
                  'message'=>'{attribute} tem de estar preenchido'),
            array('pesoAtual,altura, pesoAcordado, neds, restricaoNeds', 'numerical'),
            array('restricaoNeds, utenteId,utenteNome,
                   sexo, idade, doses, plano, prescricao,
                   verEquivalencias, horasRefeicao,
                   dosesDistribuidas, distMacro, tipoLeite', 'safe'),
            array('plano', 'required', 'on' => 'step4',
                  'message'=>'{attribute} tem de estar preenchido'),
            array('plano', 'planoValido', 'on' => 'step4'),
            array('dosesDistribuidas', 'dosesValidas'),

        );
    }

    /**
     * Verfica se as linhas do plano alimentar criadas no passo 4 são validas
     * @param $attribute plano
     * @param $params not used
     */
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
                            //remover whitespace antes da verificação
                            $linhaRefeicao["quant"]=rtrim($linhaRefeicao["quant"]);
                            $linhaRefeicao["unidade"]=rtrim($linhaRefeicao["unidade"]);
                            $linhaRefeicao["alimento"]=rtrim($linhaRefeicao["alimento"]);

                            if (empty($linhaRefeicao["quant"]) || empty($linhaRefeicao["unidade"]) || empty($linhaRefeicao["alimento"])) {
                                $this->addError($attribute, "Existem campos por preencher");
                                return;
                            }else if (!is_numeric($linhaRefeicao['quant'])
                                || $linhaRefeicao['quant'] <= 0
                                || $linhaRefeicao['quant'] == ''
                            ) {
                                $this->addError($attribute, "Defina a quantidade");
                                return;
                            }
                        } else {
                            $this->addError($attribute, "Existem campos por definir" );
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
    }


    /**
     * Valida se os valores das doses distribuidas são validos
     * @param $attribute dosesDistribuidas
     * @param $params
     */
    public  function dosesValidas($attribute, $params){
        foreach ($this->dosesDistribuidas as $i => $dosesRefeicao) {
            foreach($dosesRefeicao as $j => $dose){
                if (!is_numeric($dose)) {
                    $this->addError($attribute,"O valor ".$dose. " não é uma dose valida (ex: 2, 1.5)");
                }
            }
        }
    }

    /*
     * Cria e guarda um plano alimentar e respetivas linhas com base nos valores
     * deste Model.
     */
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
            $planoAlimentar->recomendacoes = $this->prescricao;
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
                            if ($linhaRefeicao['unidade'] != 0) {
                                $linhaPlano->id_porcao = $linhaRefeicao['unidade'];
                            }

                        }
                        $linhaPlano->quant = $linhaRefeicao['quant'];
                        $linhaPlano->descricao = $this->gerarDescricaoLinhaPlano($linhaRefeicao);
                        if (!$linhaPlano->save()) {
                            throw new Exception("Ocorreu um erro ao guardar o plano alimentar, por favor verifique os dados");
                        }
                    }
                }
            } else {
                throw new Exception("Ocorreu um erro ao guardar o plano alimentar, por favor verifique os dados");
            }

            $transaction->commit();
            return $planoAlimentar;
        } catch (Exception $e) {
            ChromePhp::log($e->getTraceAsString());
            $transaction->rollback();
            $this->addError('plano', $e->getMessage());
        }

        return null;
    }


    /**
     * Constroi o valor do campo descricao do Model LinhasPlano
     * @param $linhaRefeicao Representa uma linha de refeicao criada no passo 4
     * @return string valor a ser usado no campo descricao
     */
    private function gerarDescricaoLinhaPlano($linhaRefeicao)
    {
        if (isset($linhaRefeicao['id']) && is_numeric($linhaRefeicao['unidade'])) {
            $porcao = Porcoes::model()->findByPk($linhaRefeicao['unidade']);
            $textoPorcao = $porcao->descricao;
        } else {
            $textoPorcao = $linhaRefeicao['unidade'];
        }
        $desc = $linhaRefeicao['quant'] . ' ' . $textoPorcao . ' de ' . $linhaRefeicao['alimento'];
        return $desc;
    }


    /**
     * Construi um resumo das doses de macronutriente (passo 3) para uma determinada refeicao
     * @param $idRefeicao Id to tipo de refeicao
     * @return string resumo das doses para aquela refeicao
     */
    public function descDosesRefeicao($idRefeicao)
    {
        $desc = "Doses: ";
        foreach ($this->dosesDistribuidas[$idRefeicao] as $keyNutri => $valor) {
            if ($valor > 0) {
                $desc = $desc . PlanoAlimentarForm::$dosesString[$keyNutri] . " - " . $valor . ", ";
            }

        }
        if (strlen($desc) == 7) {
            return "";
        }
        $desc[strlen($desc) - 2] = " ";
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
            'pesoAtual' => 'Peso Atual (kg)',
            'altura' => 'Altura (m)',
            'pesoAcordado' => 'Peso Acordado (kg)',
            'restricaoNeds' => 'Restrição Energética (kcal)',
            'prescricao' => 'Prescrição',
            'neds'=>'NEDs (kcal)'
        );
    }




} 