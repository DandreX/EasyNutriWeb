<?php

class PlanosAlimentaresController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }


    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $dpLinhasPlano = new CActiveDataProvider('LinhasPlano', array(
            'criteria' => array(
              'condition'=> 'id_plano=:id',
                'params' => array(':id'=>$id,
                ),
            ),
        ));

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'dpLinhasPlano' => $dpLinhasPlano,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {

        $model = new PlanoAlimentarForm();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['PlanoAlimentarForm'])) {
//            var_dump($_POST['PlanoAlimentarForm']);
//            exit();
            $passoAtual = $_POST['passoAtual'];
            $irPara = $_POST['irPara'];
            ChromePhp::error("Post is set. PassoAtual:" . $passoAtual . " IrPara: " . $irPara);
            $model->setScenario("step" . $passoAtual);
            $model->attributes = $_POST['PlanoAlimentarForm'];

            if ($model->validate() || $irPara < $passoAtual) {
                ChromePhp::log($model->getScenario() . "é valido");
                $passoAtual = $irPara;
            } else {
                ChromePhp::log($model->getScenario() . "não valido");
            }

            if ($passoAtual==5) {
                ChromePhp::log("Passo 5 set");
                if ($model->guardarPlanoAlimentar()==null) {
                    $model->addError('plano','Ocorreu um erro ao guardar');
                    $passoAtual=4;
                    ChromePhp::log("Erro guardar plano");
                }
            }

            switch ($passoAtual) {
                case 2:
                    ChromePhp::log('a processar passo 2');
                    $tabelaDistribuicao = PlanoAlimentarForm::$tabelaDistribuicao;
                    $arrayProvider = new CArrayDataProvider($tabelaDistribuicao, array(
                        'id' => 'id',
                        'totalItemCount' => 14,
                        'pagination' => array(
                            'pageSize' => 14,
                        )));
                    $this->render('create_step2', array(
                        'model' => $model,
                        'tabelaDistribuicao' => $arrayProvider,
                    ));
                    return;
                case 3:
                    ChromePhp::log('a processar passo 3');
                    $tabelaQuantAlimentos = PlanoAlimentarForm::$tabelaQuantAlimentos;
                    $arrayProvider = new CArrayDataProvider($tabelaQuantAlimentos, array(
                        'id' => 'id',
                        'totalItemCount' => 14,
                        'pagination' => array(
                            'pageSize' => 14,
                        )));
                    $this->render('create_step3', array(
                        'model' => $model,
                        'tabelaQuantAlimentos' => $arrayProvider,
                    ));
                    return;
                case 4:
                    ChromePhp::log('a processar passo 4');
                    //obter refeicoes menos o snack
                    $refeicoes = TiposRefeicao::model()->findAll('id!=7');

                    $this->render('create_step4', array(
                        'model' => $model,
                        'refeicoes' => $refeicoes,
                    ));
                    return;
                case 5:
                    $this->render('create_step5', array(
                        'model' => $model,
                    ));
                    return;
            }

        }
        //todo inicializar valores
        if (isset($_POST['utenteId'])) {




            $utenteId = $_POST['utenteId'];
            $utente = Utentes::model()->findByPk($utenteId);

            $model->sexo = $utente->sexo;
            $model->utenteId = $utenteId;
            $model->utenteNome = $utente->nome;
            $model->idade = $utente->idade;

            //obter peso mais recente do utente
            $pesoModel = DadosAntro::model()->findByAttributes(
                array(
                    'tipo_medicao_id' => 1, //1 = id peso
                    'utente_id' => $utenteId,
                ),
                array(
                    'order' => 'data_med DESC'
                )
            );
            //if peso não existe then 0
            $model->pesoAtual = $pesoModel != null ? round($pesoModel->valor, 1) : 0;
            ChromePhp::log("Peso Atual: " . $model->pesoAtual);

            //obter altura mais recente do utente
            $alturaModel = DadosAntro::model()->findByAttributes(
                array(
                    'tipo_medicao_id' => 2, //2 = id altura
                    'utente_id' => $utenteId,
                ),
                array(
                    'order' => 'data_med DESC'
                )
            );
            //if altura não existe then 0
            $model->altura = $alturaModel != null ? round($alturaModel->valor, 2) : 0;
            ChromePhp::log("Altura Atual: " . $model->altura);

        } else
            //se o passoAtual existir significa que o formulario apenas retrocedeu
            //e nao é necessario lancar excessao
            if (!isset($_POST['passoAtual'])) {

                throw new CException('Utente não encontrado ao criar plano alimentar');
            }
        ChromePhp::log('carregado passo 1 por default');
        $this->render('create_step1', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PlanosAlimentares'])) {
            $model->attributes = $_POST['PlanosAlimentares'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->Id));
        }

        $this->render('update', array(
            'model' => $model,

        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('PlanosAlimentares');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new PlanosAlimentares('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['PlanosAlimentares']))
            $model->attributes = $_GET['PlanosAlimentares'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }



    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return PlanosAlimentares the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = PlanosAlimentares::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param PlanosAlimentares $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'planos-alimentares-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPopularModal($query)
    {
        $query = isset($query)?$query:'';
//        $model = Alimentos::model()->findAll(
//            'nome LIKE :nome',
//            array(':nome'=>"%$query%")
//        );
        $model = new CActiveDataProvider('Alimentos', array(
            'criteria'=>array(
                'condition'=>'nome LIKE :nome',
                'params'=>array(
                    ':nome'=>"%$query%"
                ),
                'offset'=>0,
                'limit'=>5,
            ),
            'pagination'=>false,
            'totalItemCount'=>10


        ));
//        $model = Alimentos::model()->findAll();
//        $model = new CActiveDataProvider('Alimentos');
//
//        var_dump($model);
        $this->renderPartial('_pesquisar_alimento',
            array(
                'query'=>$query,
                'model' => $model
            ),false,false);
    }

    public function actionAddAlimento($idAlimento,$idRefeicao,$idLinha){
        $alimento = Alimentos::model()->findByPk($idAlimento);
        $porcoes = $alimento->porcoes;
        $this->renderPartial('_linha_plano',array(
            'alimento'=>$alimento,
            'idRefeicao'=>$idRefeicao,
            'idLinha'=>$idLinha,
            'porcoes'=>$porcoes,
        ),false,true);

    }

    public function actionAddLinhaVazia($idRefeicao,$idLinha){
        $this->renderPartial('_linha_plano_vazia',array(
            'idRefeicao'=>$idRefeicao,
            'idLinha'=>$idLinha
        ),false,true);
    }

    public function actionUltimoPlano($idUtente){
        $criteria=new CDbCriteria();
        $params = array();

        $criteria->addCondition('id_utente=:idUtente');
        $params[':idUtente']=$idUtente;
        $criteria->params = $params;
        $criteria->order = 'data_presc DESC';


        $planoAlimentar = PlanosAlimentares::model()->find($criteria);

        $dpLinhasPlano = new CActiveDataProvider('LinhasPlano', array(
            'criteria' => array(
                'condition'=> 'id_plano=:id',
                'params' => array(':id'=>$planoAlimentar->Id,
                ),
            ),
        ));

        $this->renderPartial('view', array(
            'planoAlimentarUtente' => $planoAlimentar,
            'dpLinhasPlano'=>$dpLinhasPlano,
        ), false, true);

    }
}
