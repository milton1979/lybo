<?php

//class UsuarioController extends Controller
class DefaultController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('ciudadProvincia'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
                'users' => array(Yii::app()->user->getState('admin')),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(),
                'users' => array(),
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
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Usuario;
        $this->performAjaxValidation($model);

        if (isset($_POST['Usuario']['dni'])){
            $dniNull=true;
            if($_POST['Usuario']['dni']=== '')
                $dniNull=false;
            $usrOk=Usuario::model()->findByAttributes(array('dni' => $_POST['Usuario']['dni']));
            if ($usrOk) {
                $model = Usuario::model()->findByAttributes(array('dni' => $_POST['Usuario']['dni']));
                if(!$model->admin){
                    $model->admin=true;
                    if ($model->save())
                        Yii::app()->user->setFlash('exito', 'Se registró el DNI ' . $model->dni . ' como administrador');
                }
                else {
                    Yii::app()->user->setFlash('exito', 'El DNI '.$model->dni.' ya se encuentra registrado como administrador');
                }
            }
            if(!$usrOk && $dniNull){
                Yii::app()->user->setFlash('nuevoRegistro', 'El usuario no se encuentra registrado en el sistema.');
                $model->usuario = $_POST['Usuario']['dni'];
                $model->pass = $_POST['Usuario']['dni'];
                $model->admin = true;
                $model->estado = 1;
                $model->attributes = $_POST['Usuario'];
                if (isset($_POST['Usuario']['nombre'])) {
                    if ($model->save()) {
                        Yii::app()->user->setFlash('exito', 'Se registró el DNI '.$model->dni.' como administrador');
                        Yii::app()->user->getFlash('nuevoRegistro');
                        $this->redirect(array('create'));
                    }
                }
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    //FUNCION INICIAL!
    /* public function actionCreate() {
      $model = new Usuario;

      // Uncomment the following line if AJAX validation is needed
      //$this->performAjaxValidation($model);

      if (isset($_POST['Usuario'])) {
      $model->attributes = $_POST['Usuario'];
      $model->usuario = $_POST['Usuario']['dni'];
      $model->pass = $_POST['Usuario']['dni'];
      $model->admin = true;
      $model->estado = 1;
      if ($model->save())
      $this->redirect(array('view', 'id' => $model->id));
      }

      $this->render('create', array(
      'model' => $model,
      ));
      } */

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $model->admin = 0;
        if ($model->save())
            $this->redirect(array('view', 'id' => $model->id));

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Usuario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Usuario']))
            $model->attributes = $_GET['Usuario'];
        
        
        $empleados = new Empleado('search');
        $empleados->unsetAttributes(); // clear any default values
        //$submodel->idProyecto = $model->id; // IMPORTANTE!!!
        if (isset($_GET['Empleado'])) {
                $empleados->attributes = $_GET['Empleado'];
        }
        
        $socios = new Socio('search');
        $socios->unsetAttributes(); // clear any default values
        //$submodel->idProyecto = $model->id; // IMPORTANTE!!!
        if (isset($_GET['Socio'])) {
                $socios->attributes = $_GET['Socio'];
        }
        

        /*$this->render('index', array(
            'model' => $model,
        ));*/
        
        $dataProvider = new CActiveDataProvider('Usuario');
        $this->render('index', array(
            'socios'=>$socios,
            'empleados' => $empleados,
            'model'=>$model
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Usuario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Usuario']))
            $model->attributes = $_GET['Usuario'];
        
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Usuario the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Usuario::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'No se puede encontrar la pagina solicitada.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Usuario $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionCiudadProvincia() {
        $list = Ciudad::model()->findAll("idprovincia=?", array($_POST["Usuario"]["idciudad0"]));
        foreach ($list as $data) {
            echo "<option value=\"{$data->id}\">{$data->nombre}</option>";
        }
    }

}
