<?php

/**
 * This is the model class for table "linhas_refeicao".
 *
 * The followings are the available columns in table 'linhas_refeicao':
 * @property integer $id
 * @property integer $alimento_id
 * @property double $quant
 * @property integer $refeicao_id
 *
 * The followings are the available model relations:
 * @property Alimentos $alimento
 * @property Refeicoes $refeicao
 */
class LinhasRefeicao extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'linhas_refeicao';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('alimento_id, quant, refeicao_id', 'required'),
            array('alimento_id, refeicao_id', 'numerical', 'integerOnly' => true),
            array('quant', 'numerical'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, alimento_id, quant, refeicao_id', 'safe', 'on' => 'search'),
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
            'alimento' => array(self::BELONGS_TO, 'Alimentos', 'alimento_id'),
            'refeicao' => array(self::BELONGS_TO, 'Refeicoes', 'refeicao_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'alimento_id' => 'Alimento',
            'quant' => 'Quant',
            'refeicao_id' => 'Refeicao',
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
        $criteria->compare('alimento_id', $this->alimento_id);
        $criteria->compare('quant', $this->quant);
        $criteria->compare('refeicao_id', $this->refeicao_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LinhasRefeicao the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
