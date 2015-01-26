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


        if (isset($_POST['PlanoAlimentarForm'])) {

            $passoAnterior = $_POST['passoAtual'];

            $passoAtual = $_POST['passoAtual'];

            $irPara = $_POST['irPara'];
            ChromePhp::error("Post is set. PassoAtual:" . $passoAtual . " IrPara: " . $irPara);
            $model->setScenario("step" . $passoAtual);
            $model->attributes = $_POST['PlanoAlimentarForm'];

            //guarda as linhas do plano na sessao
            if (isset($model->plano)) {
                Yii::app()->session['PlanoAlimentar_Plano']=$model->plano;
            }elseif(isset(Yii::app()->session['PlanoAlimentar_Plano'])){

                $model->plano=Yii::app()->session['PlanoAlimentar_Plano'];
            }

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
                } else {
                    //enviar notificação ao utilzador
                    $notificação = new Notificacoes();
                    $notificação->utente_id=$model->utenteId;
                    $notificação->medico_id = Yii::app()->user->userid;
                    $notificação->data = date('Y-m-d H:m');
                    $notificação->assunto="Plano alimentar";
                    $notificação->descricao = Notificacoes::$notifPlanoAlimentar;
                    $notificação->save();
                    //limpar a sessao
                    unset(Yii::app()->session['PlanoAlimentar_Plano']);
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
                    $skip = false;
                    foreach($model->doses as $dose){
                        if($dose!=0){
                            ChromePhp::log("Dose".$dose);
                            $skip=false;
                            break;
                        }
                    }
                    ChromePhp::log("Saltar passo 3?".((!$skip)?'nao saltar':'saltar'). "Passo anterior:".$passoAnterior);
                    if (!$skip || $passoAnterior ==4) {
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
                    }
                case 4:
                    ChromePhp::log('a processar passo 4');
                    //obter refeicoes menos o snack
                    $refeicoes = TiposRefeicao::model()->findAll('id!=7');
                    if (isset(Yii::app()->session['PlanoAlimentar_Plano'])) {

                    }
                    $this->render('create_step4', array(
                        'model' => $model,
                        'refeicoes' => $refeicoes,
                    ));
                    return;
                case 5:
                    $url = Yii::app()->createUrl('utentes/view', array(
                        'id'=>$model->utenteId,
                        '#'=>"tab_5"));

                    $this->redirect($url);
                    return;
            }

        }else {
            //limpar a sessao se o anterior tivesse sido cancelado
            unset(Yii::app()->session['PlanoAlimentar_Plano']);
        }

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
        $l = strlen($query);
        $model = new CActiveDataProvider('Alimentos', array(
            'criteria'=>array(
                'condition'=>'nome LIKE :nome',
                'params'=>array(
                    ':nome'=>"%$query%",
                ),

                'offset'=>0,                'order'=>"
                    CASE WHEN SUBSTRING(nome,1,".$l.") = '".$query."'
                    THEN 0 ELSE 1 END ;",
                'limit'=>15,
            ),
            'pagination'=>false,
            'totalItemCount'=>10


        ));

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

    public function actionReloadLinhas($refeicaoPlano,$idRefeicao,$idLinha){
        //ex: var_dump($refeicaoPlano) =
        //array(3) { ["quant"]=> string(4) "asdf" ["unidade"]=> string(4) "asdf" ["alimento"]=> string(4) "sadf" }
        $alimento = null;
        $porcoes = null;
        if(isset($refeicaoPlano['id'])){
            //alimento da bd
            $alimento = Alimentos::model()->findByPk($refeicaoPlano['id']);
            $porcoes = $alimento->porcoes;
        }
        $this->renderPartial('_linha_plano_reload',array(
            'alimento'=>$alimento,
            'idRefeicao'=>$idRefeicao,
            'idLinha'=>$idLinha,
            'porcoes'=>$porcoes,
            'refeicaoPlano'=>$refeicaoPlano,
        ),false);
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
            'pagination'=>false,
        ));

        $this->renderPartial('view', array(
            'planoAlimentarUtente' => $planoAlimentar,
            'dpLinhasPlano'=>$dpLinhasPlano,
        ), false, true);

    }
}
