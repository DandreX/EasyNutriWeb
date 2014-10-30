<?php

/**
 * This is the model class for table "v_totais_diarios".
 *
 * The followings are the available columns in table 'v_totais_diarios':
 * @property integer $user_id
 * @property string $data
 * @property double $calorias
 * @property string $hidratos_carbono
 * @property string $acucares
 * @property string $proteinas
 * @property string $lipidos
 * @property string $fibras
 * @property string $agua
 */
class VTotaisDiarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_totais_diarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('calorias', 'numerical'),
			array('hidratos_carbono, acucares, proteinas, lipidos, fibras, agua', 'length', 'max'=>38),
			array('data', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, data, calorias, hidratos_carbono, acucares, proteinas, lipidos, fibras, agua', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'data' => 'Data',
			'calorias' => 'Calorias',
			'hidratos_carbono' => 'Hidratos Carbono',
			'acucares' => 'Acucares',
			'proteinas' => 'Proteinas',
			'lipidos' => 'Lipidos',
			'fibras' => 'Fibras',
			'agua' => 'Agua',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('calorias',$this->calorias);
		$criteria->compare('hidratos_carbono',$this->hidratos_carbono,true);
		$criteria->compare('acucares',$this->acucares,true);
		$criteria->compare('proteinas',$this->proteinas,true);
		$criteria->compare('lipidos',$this->lipidos,true);
		$criteria->compare('fibras',$this->fibras,true);
		$criteria->compare('agua',$this->agua,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VTotaisDiarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
