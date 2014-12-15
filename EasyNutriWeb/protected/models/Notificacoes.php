<?php

/**
 * This is the model class for table "notificacoes".
 *
 * The followings are the available columns in table 'notificacoes':
 * @property integer $id
 * @property integer $medico_id
 * @property integer $utente_id
 * @property string $descricao
 * @property string $data
 * @property string $assunto
 *
 * The followings are the available model relations:
 * @property Users $medico
 * @property Utentes $utente
 */
class Notificacoes extends CActiveRecord
{
    public static $notifPlanoAlimentar ="O seu plano alimentar foi utilzado por favor
                                        consulte-o no seperador 'Plano Alimentar'";

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'notificacoes';
    }

    public function getNomeUtente()
    {
        return $this->utente->nome;
    }


    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('medico_id, utente_id, descricao, data, assunto', 'required'),
            array('medico_id, utente_id', 'numerical', 'integerOnly' => true),
            array('assunto', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, medico_id, utente_id, descricao, data, assunto', 'safe', 'on' => 'search'),
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
            'medico_id' => 'Medico',
            'utente_id' => 'Utente',
            'descricao' => 'Descricao',
            'data' => 'Data',
            'assunto' => 'Assunto',
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
        $criteria->compare('medico_id', Yii::app()->user->userid,true);
        $criteria->compare('utente_id', $this->utente_id);
        $criteria->compare('descricao', $this->descricao, true);
        $criteria->compare('data', $this->data, true);
        $criteria->compare('assunto', $this->assunto, true);


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'data desc',
            )
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Notificacoes the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
