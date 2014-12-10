<?php

/**
 * This is the model class for table "ficha_clinica".
 *
 * The followings are the available columns in table 'ficha_clinica':
 * @property integer $id
 * @property double $peso_nascenca
 * @property double $peso_minimo
 * @property double $peso_maximo
 * @property double $peso_habitual
 * @property string $tent_perda_peso
 * @property string $antec_familiares
 * @property string $antec_pessoais
 * @property string $patologias
 * @property string $alergias_alim
 * @property string $intol_alim
 * @property string $problem_digestao
 * @property string $transito_intestinal
 * @property string $habitos_toxicos
 * @property string $medic_suplem_alim
 * @property integer $idUtente
 *
 * The followings are the available model relations:
 * @property Utentes $utente
 */
class FichaClinica extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ficha_clinica';
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
			array('peso_nascenca, peso_minimo, peso_maximo, peso_habitual', 'numerical'),
			array('tent_perda_peso, antec_familiares, antec_pessoais, patologias, alergias_alim, intol_alim, problem_digestao, transito_intestinal, habitos_toxicos, medic_suplem_alim', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, peso_nascenca, peso_minimo, peso_maximo, peso_habitual, tent_perda_peso, antec_familiares, antec_pessoais, patologias, alergias_alim, intol_alim, problem_digestao, transito_intestinal, habitos_toxicos, medic_suplem_alim, idUtente', 'safe', 'on'=>'search'),
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
			'utente' => array(self::BELONGS_TO, 'Utentes', 'idUtente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'peso_nascenca' => 'Peso à Nascença',
			'peso_minimo' => 'Peso Mínimo',
			'peso_maximo' => 'Peso Máximo',
			'peso_habitual' => 'Peso Habitual',
			'tent_perda_peso' => 'Tentativas de Perda de Peso',
			'antec_familiares' => 'Antecedentes Familiares',
			'antec_pessoais' => 'Antecedentes Pessoais',
			'patologias' => 'Patologias',
			'alergias_alim' => 'Alergias Alimentares',
			'intol_alim' => 'Intolerâncias Alimentares',
			'problem_digestao' => 'Problemas Digestão',
			'transito_intestinal' => 'Trânsito Intestinal',
			'habitos_toxicos' => 'Hábitos Tóxicos',
			'medic_suplem_alim' => 'Medicamentos/Suplementos Alimentares',
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
		$criteria->compare('peso_nascenca',$this->peso_nascenca);
		$criteria->compare('peso_minimo',$this->peso_minimo);
		$criteria->compare('peso_maximo',$this->peso_maximo);
		$criteria->compare('peso_habitual',$this->peso_habitual);
		$criteria->compare('tent_perda_peso',$this->tent_perda_peso,true);
		$criteria->compare('antec_familiares',$this->antec_familiares,true);
		$criteria->compare('antec_pessoais',$this->antec_pessoais,true);
		$criteria->compare('patologias',$this->patologias,true);
		$criteria->compare('alergias_alim',$this->alergias_alim,true);
		$criteria->compare('intol_alim',$this->intol_alim,true);
		$criteria->compare('problem_digestao',$this->problem_digestao,true);
		$criteria->compare('transito_intestinal',$this->transito_intestinal,true);
		$criteria->compare('habitos_toxicos',$this->habitos_toxicos,true);
		$criteria->compare('medic_suplem_alim',$this->medic_suplem_alim,true);
		$criteria->compare('idUtente',$this->idUtente);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FichaClinica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
