<?php

/**
 * This is the model class for table "planos_alimentares".
 *
 * The followings are the available columns in table 'planos_alimentares':
 * @property integer $Id
 * @property integer $id_utente
 * @property integer $id_medico
 * @property string $data_presc
 * @property integer $ned
 *
 * The followings are the available model relations:
 * @property Users $idMedico
 * @property Utentes $idUtente
 * @property LinhasPlano[] $linhasPlanos
 */
class PlanosAlimentares extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'planos_alimentares';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_utente, id_medico, data_presc, ned', 'required'),
			array('id_utente, id_medico, ned', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, id_utente, id_medico, data_presc, ned', 'safe', 'on'=>'search'),
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
			'idMedico' => array(self::BELONGS_TO, 'Users', 'id_medico'),
			'idUtente' => array(self::BELONGS_TO, 'Utentes', 'id_utente'),
			'linhasPlanos' => array(self::HAS_MANY, 'LinhasPlano', 'id_plano'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'id_utente' => 'Id Utente',
			'id_medico' => 'Id Medico',
			'data_presc' => 'Data Presc',
			'ned' => 'Ned',
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

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('id_utente',$this->id_utente);
		$criteria->compare('id_medico',$this->id_medico);
		$criteria->compare('data_presc',$this->data_presc,true);
		$criteria->compare('ned',$this->ned);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PlanosAlimentares the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
