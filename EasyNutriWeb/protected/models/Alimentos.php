<?php

/**
 * This is the model class for table "alimentos".
 *
 * The followings are the available columns in table 'alimentos':
 * @property string $id
 * @property string $nome
 * @property double $kcal
 * @property double $agua
 * @property double $proteinas
 * @property double $lipidos
 * @property double $hidratos_carbono
 * @property double $acucares
 * @property double $fibras
 * @property string $unidade
 *
 * The followings are the available model relations:
 * @property LinhasRefeicao[] $linhasRefeicaos
 * @property Porcoes[] $porcoes
 * @property LinhasPlano[] $linhasPlanos
 */
class Alimentos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'alimentos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('kcal, agua, proteinas, lipidos, hidratos_carbono, acucares, fibras', 'numerical'),
			array('id, nome, unidade', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, kcal, agua, proteinas, lipidos, hidratos_carbono, acucares, fibras, unidade', 'safe', 'on'=>'search'),
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
			'linhasRefeicaos' => array(self::HAS_MANY, 'LinhasRefeicao', 'alimento_id'),
			'porcoes' => array(self::HAS_MANY, 'Porcoes', 'id_alimento'),
			'linhasPlanos' => array(self::HAS_MANY, 'LinhasPlano', 'id_alimento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'kcal' => 'Kcal',
			'agua' => 'Agua',
			'proteinas' => 'Proteinas',
			'lipidos' => 'Lipidos',
			'hidratos_carbono' => 'Hidratos Carbono',
			'acucares' => 'Acucares',
			'fibras' => 'Fibras',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('kcal',$this->kcal);
		$criteria->compare('agua',$this->agua);
		$criteria->compare('proteinas',$this->proteinas);
		$criteria->compare('lipidos',$this->lipidos);
		$criteria->compare('hidratos_carbono',$this->hidratos_carbono);
		$criteria->compare('acucares',$this->acucares);
		$criteria->compare('fibras',$this->fibras);
		$criteria->compare('unidade',$this->unidade,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Alimentos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
