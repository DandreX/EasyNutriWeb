<?php

/**
 * This is the model class for table "dados_antro".
 *
 * The followings are the available columns in table 'dados_antro':
 * @property integer $id
 * @property integer $tipo_medicao_id
 * @property double $valor
 * @property string $data_med
 * @property string $unidade
 * @property integer $utente_id
 * @property string $em_Casa
 *
 * The followings are the available model relations:
 * @property TipoMedicao $tipoMedicao
 * @property Utentes $utente
 */
class DadosAntro extends CActiveRecord
{
    //constantes das escalas temporais dos graficos
    public static $ULTIMO_MES = 0;
    public static $ULTIMOS_6MESES = 1;
    public static $ULTIMO_ANO = 2;
    public static $TODOS = 3;


    public $nomeUtenteSearch;
    public $tipoMedicaoSearch;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'dados_antro';
    }

    public function getNomeUtente()
    {
        if ($this->utente_id) {
            return $this->utente->nome;
        }
    }

    public function getTipoMedicaoDesc()
    {
        if ($this->tipo_medicao_id) {
            return $this->tipoMedicao->descricao;
        }
    }

    public function getLocal()
    {
        return ($this->em_Casa == 0) ? "Consulta" : "Em casa";
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipo_medicao_id, valor, data_med, utente_id', 'required'),
            array('tipo_medicao_id, utente_id', 'numerical', 'integerOnly' => true),
            array('valor', 'numerical'),
            array('em_Casa', 'length', 'max' => 1),
//            array('unidade', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('data_med', 'type', 'type' => 'date', 'message' => '{attribute}: não é uma data!', 'dateFormat' => 'yyyy-MM-dd hh:mm'),
            array('id, tipo_medicao_id, valor, data_med, utente_id, nomeUtenteSearch, tipoMedicaoSearch,em_Casa,local, tipoMedicaoDesc', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tipoMedicao' => array(self::BELONGS_TO, 'TipoMedicao', 'tipo_medicao_id'),
            'utente' => array(self::BELONGS_TO, 'Utentes', 'utente_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'tipo_medicao_id' => 'Tipo Medicao',
            'valor' => 'Valor',
            'data_med' => 'Data / Hora',
            'utente_id' => 'Utente',
            'nomeUtenteSearch' => 'Utente',
            'tipoMedicaoSearch' => 'Medição',
            'em_Casa' => 'Local Medição',
            'local' => 'Local',
            'tipoMedicaoDesc' => 'Medição',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->with = array('utente', 'tipoMedicao');

        $criteria->compare('id', $this->id);
        $criteria->compare('tipo_medicao_id', $this->tipo_medicao_id);
        $criteria->compare('valor', $this->valor);
        $criteria->compare('data_med', $this->data_med, true);
        $criteria->compare('utente_id', $this->utente_id);
        $criteria->compare('em_Casa', $this->em_Casa, true);
        $criteria->compare('utente.nome', $this->nomeUtenteSearch, true);
        $criteria->compare('tipoMedicao.descricao', $this->tipoMedicaoSearch, true);
        $criteria->compare('utente.medico_id', Yii::app()->user->userid, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DadosAntro the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
