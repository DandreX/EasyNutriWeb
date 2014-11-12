<?php

/**
 * This is the model class for table "utentes".
 *
 * The followings are the available columns in table 'utentes':
 * @property integer $id
 * @property string $morada
 * @property string $nome
 * @property string $username
 * @property string $password
 * @property string $data_nascimento
 * @property string $sexo
 * @property string $email
 * @property string $telefone
 * @property string $nif
 * @property string $profissao
 * @property string $estado_civil
 * @property string $motivo_consulta
 * @property integer $medico_id
 *
 * The followings are the available model relations:
 * @property DadosAntro[] $dadosAntros
 * @property DiarioAlimentar[] $diarioAlimentars
 * @property Users $medico
 */
class Utentes extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'utentes';
    }

    public function getSexos()
    {
        return array('M' => 'Masculino', 'F' => 'Feminino');
    }

    public function getMedicoNome()
    {
        return $this->medico->nome;
    }


    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nome, username, password, sexo, medico_id,data_nascimento ', 'required'),
            array('nif', 'numerical', 'integerOnly' => true),
            array('username', 'length', 'max' => 100),
            array('nif', 'length', 'min' => 8),
            array('morada, email', 'length', 'max' => 150),
            array('password', 'length', 'max' => 128),
            array('sexo', 'length', 'max' => 1),
            array('telefone', 'length', 'max' => 30),
            array('data_nascimento', 'safe'),
            array('nif', 'length', 'max' => 19),
            array('data_nascimento, profissao, estado_civil, motivo_consulta', 'safe'),
//            array('sexo','match','pattern','M|F'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, morada, nome, username, password, data_nascimento, sexo, email, telefone, nif, profissao, estado_civil, motivo_consulta', 'safe', 'on' => 'search'),
            array('data_nascimento', 'type', 'type' => 'date', 'message' => '{attribute}: não é uma data!', 'dateFormat' => 'yyyy-MM-dd'),
            array('email', 'email', 'message' => '{attribute}: não é um email válido'),
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
            'dadosAntros' => array(self::HAS_MANY, 'DadosAntro', 'utente_id'),
            'diarioAlimentars' => array(self::HAS_MANY, 'DiarioAlimentar', 'user_id'),
            'medico' => array(self::BELONGS_TO, 'Users', 'medico_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'morada' => 'Morada',
            'nome' => 'Nome',
            'username' => 'Username',
            'password' => 'Password',
            'data_nascimento' => 'Data Nascimento',
            'sexo' => 'Sexo',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'nif' => 'Nif',
            'profissao' => 'Profissao',
            'estado_civil' => 'Estado Civil',
            'motivo_consulta' => 'Motivo Consulta',
            'medico_id' => 'Medico',
            'medicoNome' => 'Medico',
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
        $criteria->compare('morada', $this->morada, true);
        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('username', $this->username, true);
       // $criteria->compare('password', $this->password, true);
        $criteria->compare('data_nascimento', $this->data_nascimento, true);
        $criteria->compare('sexo', $this->sexo, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('telefone', $this->telefone, true);
        $criteria->compare('nif', $this->nif);
        $criteria->compare('profissao', $this->profissao, true);
        $criteria->compare('estado_civil', $this->estado_civil, true);
        $criteria->compare('motivo_consulta', $this->motivo_consulta, true);
       // $criteria->compare('medico_id', $this->medico_id);
        $criteria->compare('medico_id', Yii::app()->user->userid);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Utentes the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
