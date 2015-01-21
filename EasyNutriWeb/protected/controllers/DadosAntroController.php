<?php

class DadosAntroController extends Controller
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
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new DadosAntro;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $validar = true;
        $mensagem = "";
        if (isset($_POST['DadosAntro']['utente'])) {
            $model->utente_id = $_POST['DadosAntro']['utente'];
            $validar = false;
        }
        if (isset($_POST['DadosAntro']) && $validar) {
            $model->attributes = $_POST['DadosAntro'];
            if ($model->save())
                $this->redirect(array('utentes/view','id'=>$model->utente_id, '#'=> "tab_4"));
        }

        $this->render('create', array(
            'model' => $model,
            'mensagem'=>$mensagem,
        ));
    }
    public function actionCreateAndNew()
    {
        $model = new DadosAntro;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $validar = true;
        $mensagem = "";
        if (isset($_POST['DadosAntro']['utente'])) {
            $model->utente_id = $_POST['DadosAntro']['utente'];
            $validar = false;
        }
        if (isset($_POST['DadosAntro']) && $validar) {
            $model->attributes = $_POST['DadosAntro'];
            if ($model->save()){
                $idUtente = $model->utente_id;
                $model = new DadosAntro();
                $model->utente_id = $idUtente;
                $mensagem="Dado Antropométrico guardado com sucesso";
            }
        }

        $this->render('create', array(
            'model' => $model,
            'mensagem'=>$mensagem,
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

        if (isset($_POST['DadosAntro'])) {
            $model->attributes = $_POST['DadosAntro'];
            if ($model->save())
                $this->redirect(array('admin'));
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
        $this->redirect(array('admin'));
//		$dataProvider=new CActiveDataProvider('DadosAntro');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        try {
            $model = new DadosAntro('search');
            $model->unsetAttributes(); // clear any default values
            if (isset($_GET['DadosAntro']))
                $model->attributes = $_GET['DadosAntro'];
        } catch (CDbException $e) {
            var_dump($e);
        };


        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionViewGraphs($idUtente, $escala)
    {
        $modelUtente = Utentes::model()->findByPk($idUtente);

        $pesos = array();
        $pesos['valoresConsulta'] = array();
        $pesos['valoresCasa'] = array();
        $queryPesos = Yii::app()->db->createCommand()
            ->select('valor as pesos, data_med as datas,em_casa, em_Casa')
            ->from('dados_antro')
            ->where('tipo_medicao_id = 1 and utente_id = ' . $idUtente)
            ->order('data_med')
            ->queryAll();


        foreach ($queryPesos as $linha) {
            if ($linha['em_Casa'] == 0) {
                array_push($pesos['valoresConsulta'], array(
                    'js:Date.UTC(' . gmdate("Y, m, d, H, i, s", strtotime('-1 month', strtotime($linha['datas']))) . ')', floatval($linha['pesos'])));
            } else {
                array_push($pesos['valoresCasa'], array(
                    'js:Date.UTC(' . gmdate("Y, m, d, H, i, s", strtotime('-1 month', strtotime($linha['datas']))) . ')', floatval($linha['pesos'])));
            }

        }

        $massa = array();
        $massa['valores'] = array();
        $queryMassa = Yii::app()->db->createCommand()
            ->select('valor as massa, data_med as datas,em_casa')
            ->from('dados_antro')
            ->where('tipo_medicao_id = 6 and utente_id = ' . $idUtente)
            ->order('data_med')
            ->queryAll();
        foreach ($queryMassa as $linha) {
            array_push($massa['valores'], array(
                'js:Date.UTC(' . gmdate("Y, m, d, H, i, s", strtotime('-1 month', strtotime($linha['datas']))
                ) . ')', floatval($linha['massa'])));
        }
        $graficos = array();
        $graficos['peso'] = $pesos;
        $graficos['massa'] = $massa;

        $this->renderPartial('_dados_antro_graphs', array(
            'graficos' => $graficos,
            'modelUtente' => $modelUtente,
        ), false, true);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return DadosAntro the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = DadosAntro::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param DadosAntro $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'dados-antro-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
