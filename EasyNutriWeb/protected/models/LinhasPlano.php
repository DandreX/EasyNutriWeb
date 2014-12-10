<?php

/**
 * This is the model class for table "linhas_plano".
 *
 * The followings are the available columns in table 'linhas_plano':
 * @property integer $Id
 * @property integer $id_plano
 * @property integer $id_tipo_refeicao
 * @property string $id_alimento
 * @property double $quant
 * @property integer $id_porcao
 * @property string $hora
 * @property string $descricao
 *
 * The followings are the available model relations:
 * @property Alimentos $idAlimento
 * @property PlanosAlimentares $idPlano
 * @property Porcoes $idPorcao
 * @property TiposRefeicao $idTipoRefeicao
 */
class LinhasPlano extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'linhas_plano';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_plano, id_tipo_refeicao, quant, hora, descricao', 'required'),
			array('id_plano, id_tipo_refeicao, id_porcao', 'numerical', 'integerOnly'=>true),
			array('quant', 'numerical'),
			array('id_alimento', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, id_plano, id_tipo_refeicao, id_alimento, quant, id_porcao, hora, descricao', 'safe', 'on'=>'search'),
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
			'idAlimento' => array(self::BELONGS_TO, 'Alimentos', 'id_alimento'),
			'idPlano' => array(self::BELONGS_TO, 'PlanosAlimentares', 'id_plano'),
			'idPorcao' => array(self::BELONGS_TO, 'Porcoes', 'id_porcao'),
			'idTipoRefeicao' => array(self::BELONGS_TO, 'TiposRefeicao', 'id_tipo_refeicao'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'id_plano' => 'Id Plano',
			'id_tipo_refeicao' => 'Id Tipo Refeicao',
			'id_alimento' => 'Id Alimento',
			'quant' => 'Quant',
			'id_porcao' => 'Id Porcao',
			'hora' => 'Hora',
			'descricao' => 'Descricao',
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
		$criteria->compare('id_plano',$this->id_plano);
		$criteria->compare('id_tipo_refeicao',$this->id_tipo_refeicao);
		$criteria->compare('id_alimento',$this->id_alimento,true);
		$criteria->compare('quant',$this->quant);
		$criteria->compare('id_porcao',$this->id_porcao);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('descricao',$this->descricao,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LinhasPlano the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
