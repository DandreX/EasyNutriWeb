<?php

/**
 * This is the model class for table "porcoes".
 *
 * The followings are the available columns in table 'porcoes':
 * @property string $descricao
 * @property double $porcao
 * @property string $id_alimento
 * @property integer $id
 * @property string $unidades
 *
 * The followings are the available model relations:
 * @property LinhasRefeicao[] $linhasRefeicaos
 * @property Alimentos $idAlimento
 * @property LinhasPlano[] $linhasPlanos
 */
class Porcoes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'porcoes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descricao, porcao, id_alimento, unidades', 'required'),
			array('porcao', 'numerical'),
			array('descricao, id_alimento', 'length', 'max'=>255),
			array('unidades', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('descricao, porcao, id_alimento, id, unidades', 'safe', 'on'=>'search'),
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
			'linhasRefeicaos' => array(self::HAS_MANY, 'LinhasRefeicao', 'porcao_id'),
			'idAlimento' => array(self::BELONGS_TO, 'Alimentos', 'id_alimento'),
			'linhasPlanos' => array(self::HAS_MANY, 'LinhasPlano', 'id_porcao'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'descricao' => 'Descricao',
			'porcao' => 'Porcao',
			'id_alimento' => 'Id Alimento',
			'id' => 'ID',
			'unidades' => 'Unidades',
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

		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('porcao',$this->porcao);
		$criteria->compare('id_alimento',$this->id_alimento,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('unidades',$this->unidades,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Porcoes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
