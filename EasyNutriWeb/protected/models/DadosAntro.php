<?php

/**
 * This is the model class for table "dados_antro".
 *
 * The followings are the available columns in table 'dados_antro':
 * @property integer $id
 * @property integer $user_id
 * @property integer $tipo_medicao_id
 * @property double $valor
 * @property string $data_med
 * @property string $unidade
 *
 * The followings are the available model relations:
 * @property TipoMedicao $tipoMedicao
 */
class DadosAntro extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'dados_antro';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, tipo_medicao_id, valor, data_med', 'required'),
            array('user_id, tipo_medicao_id', 'numerical', 'integerOnly' => true),
            array('valor', 'numerical'),
            array('unidade', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, tipo_medicao_id, valor, data_med, unidade', 'safe', 'on' => 'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user_id' => 'Utente',
            'tipo_medicao_id' => 'Tipo de Medição',
            'valor' => 'Valor da Medição',
            'data_med' => 'Data da Medição',
            'unidade' => 'Unidade',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('tipo_medicao_id', $this->tipo_medicao_id);
        $criteria->compare('valor', $this->valor);
        $criteria->compare('data_med', $this->data_med, true);
        $criteria->compare('unidade', $this->unidade, true);

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
