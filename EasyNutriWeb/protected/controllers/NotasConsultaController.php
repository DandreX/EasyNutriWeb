<?php

class NotasConsultaController extends Controller
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
//			'postOnly + delete', // we only allow deletion via POST request
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
//            array('allow', // allow all users to perform 'index' and 'view' actions
//                'actions' => array('index', 'view'),
//                'users' => array('*'),
//            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'users' => array('@'),
            ),
//            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions' => array('admin', 'delete'),
//                'users' => array('admin'),
//            ),
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
    public function actionCreate($idUtente)
    {
        $model = new NotasConsulta;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['NotasConsulta'])) {
            $model->attributes = $_POST['NotasConsulta'];
            $model->utente_id = $idUtente;
            $model->medico_id = Yii::app()->user->userid;

            if ($model->save()) {

                $url = yii::app()->createUrl("utentes/view", array('id' => $idUtente, '#' => 'tab_7'));

                $this->redirect($url);


            } else {
//                throw new Exception('Erro a guardar Nota de Consulta');
            }
        }

        $this->render('create', array(
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

        if (isset($_POST['NotasConsulta'])) {
            $model->attributes = $_POST['NotasConsulta'];


            if ($model->save()) {
                $url = yii::app()->createUrl("utentes/view", array('id' => $model->utente_id, '#' => 'tab_7'));
                $this->redirect($url);
            }
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
        var_dump("entrou action delete");
        $model = $this->loadModel($id);
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $url = yii::app()->createUrl("utentes/view", array('id' => $model->utente_id, '#' => 'tab_7'));

            $this->redirect($url);
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('NotasConsulta');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new NotasConsulta('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['NotasConsulta']))
            $model->attributes = $_GET['NotasConsulta'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return NotasConsulta the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = NotasConsulta::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param NotasConsulta $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'notas-consulta-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
