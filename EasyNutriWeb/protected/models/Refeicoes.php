<?php

/**
 * This is the model class for table "refeicoes".
 *
 * The followings are the available columns in table 'refeicoes':
 * @property integer $id
 * @property integer $diario_id
 * @property integer $tipo_refeicao_id
 * @property string $data_refeicao
 *
 * The followings are the available model relations:
 * @property LinhasRefeicao[] $linhasRefeicaos
 * @property DiarioAlimentar $diario
 * @property TiposRefeicao $tipoRefeicao
 */
class Refeicoes extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'refeicoes';
    }


    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('diario_id, tipo_refeicao_id, data_refeicao', 'required'),
            array('diario_id, tipo_refeicao_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, diario_id, tipo_refeicao_id, data_refeicao', 'safe', 'on' => 'search'),
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
            'linhasRefeicaos' => array(self::HAS_MANY, 'LinhasRefeicao', 'refeicao_id'),
            'diario' => array(self::BELONGS_TO, 'DiarioAlimentar', 'diario_id'),
            'tipoRefeicao' => array(self::BELONGS_TO, 'TiposRefeicao', 'tipo_refeicao_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'diario_id' => 'Diario',
            'tipo_refeicao_id' => 'Tipo Refeicao',
            'data_refeicao' => 'Data Refeicao',
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
        $criteria->compare('diario_id', $this->diario_id);
        $criteria->compare('tipo_refeicao_id', $this->tipo_refeicao_id);
        $criteria->compare('data_refeicao', $this->data_refeicao, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Refeicoes the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
