<?php

/**
 * This is the model class for table "habitos_alimentares".
 *
 * The followings are the available columns in table 'habitos_alimentares':
 * @property integer $id
 * @property string $hora_local_comp_ref
 * @property string $metod_culin_comum
 * @property string $ing_doce_alim_gordo
 * @property string $ing_hidrica_diaria
 * @property string $activ_fisica
 * @property integer $idUtente
 *
 * The followings are the available model relations:
 * @property Utentes $idUtente0
 */
class HabitosAlimentares extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'habitos_alimentares';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUtente', 'required'),
			array('idUtente', 'numerical', 'integerOnly'=>true),
			array('hora_local_comp_ref, metod_culin_comum, ing_doce_alim_gordo, ing_hidrica_diaria, activ_fisica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hora_local_comp_ref, metod_culin_comum, ing_doce_alim_gordo, ing_hidrica_diaria, activ_fisica, idUtente', 'safe', 'on'=>'search'),
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
			'idUtente0' => array(self::BELONGS_TO, 'Utentes', 'idUtente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hora_local_comp_ref' => 'Horário, local e composição das refeições',
			'metod_culin_comum' => 'Métodos culinários mais comuns',
			'ing_doce_alim_gordo' => 'Ingestão de doces e alimentos gordos',
			'ing_hidrica_diaria' => 'Ingestão hídrica diária',
			'activ_fisica' => 'Actividade física',
			'idUtente' => 'Id Utente',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('hora_local_comp_ref',$this->hora_local_comp_ref,true);
		$criteria->compare('metod_culin_comum',$this->metod_culin_comum,true);
		$criteria->compare('ing_doce_alim_gordo',$this->ing_doce_alim_gordo,true);
		$criteria->compare('ing_hidrica_diaria',$this->ing_hidrica_diaria,true);
		$criteria->compare('activ_fisica',$this->activ_fisica,true);
		$criteria->compare('idUtente',$this->idUtente);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HabitosAlimentares the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
