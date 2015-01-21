<?php

/**
 * This is the model class for table "notas_consulta".
 *
 * The followings are the available columns in table 'notas_consulta':
 * @property integer $id
 * @property string $descricao
 * @property string $data
 * @property integer $utente_id
 * @property integer $medico_id
 *
 * The followings are the available model relations:
 * @property Users $medico
 * @property Utentes $utente
 */
class NotasConsulta extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'notas_consulta';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('utente_id, medico_id', 'required'),
            array('utente_id, medico_id', 'numerical', 'integerOnly' => true),
            array('descricao, data', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, descricao, data, utente_id, medico_id', 'safe', 'on' => 'search'),
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
            'medico' => array(self::BELONGS_TO, 'Users', 'medico_id'),
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
            'descricao' => 'Descricao',
            'data' => 'Data',
            'utente_id' => 'Utente',
            'medico_id' => 'Medico',
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
        $criteria->compare('descricao', $this->descricao, true);
        $criteria->compare('data', $this->data, true);
        $criteria->compare('utente_id', $this->utente_id);
        $criteria->compare('medico_id', $this->medico_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return NotasConsulta the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
