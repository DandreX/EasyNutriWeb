<?php

/**
 * This is the model class for table "v_linhas_refeicao".
 *
 * The followings are the available columns in table 'v_linhas_refeicao':
 * @property integer $user_id
 * @property string $data
 * @property string $hora
 * @property integer $tipo_refeicao_id
 * @property string $tipo_refeicao
 * @property integer $linha_id
 * @property integer $refeicao_id
 * @property string $nome
 * @property double $quant
 * @property double $calorias
 * @property string $hidratos_carbono
 * @property string $acucares
 * @property string $proteinas
 * @property string $lipidos
 * @property string $fibras
 * @property string $agua
 */
class VLinhasRefeicao extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_linhas_refeicao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, data, tipo_refeicao_id, tipo_refeicao, linha_id, refeicao_id, nome, quant, calorias', 'required'),
			array('user_id, tipo_refeicao_id, linha_id, refeicao_id', 'numerical', 'integerOnly'=>true),
			array('quant, calorias', 'numerical'),
			array('tipo_refeicao', 'length', 'max'=>100),
			array('nome', 'length', 'max'=>255),
			array('hidratos_carbono, acucares, proteinas, lipidos, fibras, agua', 'length', 'max'=>10),
			array('hora', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, data, hora, tipo_refeicao_id, tipo_refeicao, linha_id, refeicao_id, nome, quant, calorias, hidratos_carbono, acucares, proteinas, lipidos, fibras, agua', 'safe', 'on'=>'search'),
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
			'hora' => 'Hora',
			'tipo_refeicao_id' => 'Tipo Refeicao',
			'tipo_refeicao' => 'Tipo Refeicao',
			'linha_id' => 'Linha',
			'refeicao_id' => 'Refeicao',
			'nome' => 'Nome',
			'quant' => 'Quant',
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
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('tipo_refeicao_id',$this->tipo_refeicao_id);
		$criteria->compare('tipo_refeicao',$this->tipo_refeicao,true);
		$criteria->compare('linha_id',$this->linha_id);
		$criteria->compare('refeicao_id',$this->refeicao_id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('quant',$this->quant);
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
	 * @return VLinhasRefeicao the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
