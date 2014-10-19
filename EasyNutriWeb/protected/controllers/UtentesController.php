<?php

class UtentesController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
                'actions' => array('index','view','create','update','admin', 'delete'),
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
        $model = new Utentes;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Utentes'])) {
            try {
                $model->attributes = $_POST['Utentes'];
                $model->medico_id = 1;
                $model->password = 'easynutri';


                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id));
            } catch (CDbException $e) {
                $model->addError('', $e->errorInfo[2]);
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

        if (isset($_POST['Utentes'])) {
            try {


                $model->attributes = $_POST['Utentes'];
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id));

            } catch (CDbException $e) {
                $model->addError('', $e->errorInfo[2]);

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
        try {
            $this->loadModel($id)->delete();
        } catch (CDbException $e) {
            throw new CHttpException(500, "\nImpossivel apagar utente");
        }

        //$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array(index));

    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $this->redirect(array('admin'));
//		$dataProvider=new CActiveDataProvider('Utentes');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {

        $model = new Utentes('search');
      //  $model = Utentes::model()->findAllByAttributes(array(),'medico_id=:userid', array(':userid'=>Yii::app()->user->userid));
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Utentes']))
            $model->attributes = $_GET['Utentes'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Utentes the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Utentes::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Utentes $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'utentes-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
