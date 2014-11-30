<?php

class SocioController extends Controller {
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
                'actions' => array('index', 'view', 'ciudadProvincia'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
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
        $model = new Socio;
        $modelUs = new Usuario;
        $this->performAjaxValidation(array($model, $modelUs));

        if (isset($_POST['Usuario']['dni'])){
            $datosOk=true;
            if(($_POST['Usuario']['dni']=== '') || ($_POST['Socio']['idbiblioteca']=== '')){
                $datosOk=false;
                $model->idbiblioteca=$_POST['Socio']['idbiblioteca'];
                $model->save();
            }
            $usrOk=Usuario::model()->findByAttributes(array('dni' => $_POST['Usuario']['dni']));
            if ($usrOk) {
                $modelUs = Usuario::model()->findByAttributes(array('dni' => $_POST['Usuario']['dni']));
                $model->idbiblioteca = $_POST['Socio']['idbiblioteca'];
                $model->idusuario = $modelUs->id;
                if (!Socio::model()->findByAttributes(array('idbiblioteca' => $model->idbiblioteca, 'idusuario' => $model->idusuario))) {
                    if ($model->save())
                        Yii::app()->user->setFlash('exito', 'Se registró el DNI ' . $modelUs->dni . ' como socio de la biblioteca ' . $model->idbiblioteca0->nombre);
                } else {
                    Yii::app()->user->setFlash('exito', 'El DNI ' . $modelUs->dni . ' ya se encuentra registrado como socio de la biblioteca ' . $model->idbiblioteca0->nombre);
                }
            }
            if(!$usrOk && $datosOk){
                Yii::app()->user->setFlash('nuevoRegistro', 'El usuario no se encuentra registrado en el sistema.');
                $modelUs->dni = $_POST['Usuario']['dni'];
                $modelUs->usuario = $_POST['Usuario']['dni'];
                $modelUs->pass = $_POST['Usuario']['dni'];
                $modelUs->admin = 0;
                $modelUs->estado = 1;
                $modelUs->attributes = $_POST['Usuario'];
                $model->idbiblioteca = $_POST['Socio']['idbiblioteca'];
                if (isset($_POST['Usuario']['nombre'])) {
                    if ($modelUs->save()) {
                        $model->idusuario = $modelUs->id;
                        if ($model->save()) {
                        	$email = new EnviarEmail;
                        	$subject ="Sea registrado con exito, como socio ";
                        	$subject .= Yii::app()->name;
                        	$message = "<h2>Bienvenid@</h2> <br>". "<b>Usuario: </b>".$modelUs->usuario ."<br><b> Su password es: </b>".$modelUs->pass ."";
			    	        
                        	$message .="<br/><br/>";
                        	$message .="<a href='http://meta.fi.uncoma.edu.ar/lybo/'>Regresar a web</a>";
                        	
                        	$email->Enviar_Email(
                        			array(Yii::app()->params['adminEmail'], Yii::app()->name),
                        			array($modelUs->email, $modelUs->nombre),
                        			$subject,
                        			$message
                        	);
                            Yii::app()->user->setFlash('exito', 'Se registró el DNI ' . $modelUs->dni . ' como socio de la biblioteca ' . $model->idbiblioteca0->nombre);
                            Yii::app()->user->getFlash('nuevoRegistro');
                            $this->redirect(array('create'));
                        }
                    }
                }
            }
        }
        $this->render('create', array(
            'model' => $model,
            'modelUs' => $modelUs,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = new Socio;
        $modelUs = new Usuario;
        $this->performAjaxValidation(array($model, $modelUs));
        $model = $this->loadModel($id);
        $modelUs = Usuario::model()->findByPk($model->idusuario);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {
            $modelUs->attributes = $_POST['Usuario'];
            if ($modelUs->save())
                $this->redirect(array('view', 'id' => $model->idsocio));
        }

        $this->render('update', array(
            'model' => $model,
            'modelUs' => $modelUs,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Socio');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Socio('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Socio']))
            $model->attributes = $_GET['Socio'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Socio::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'socio-form') {
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
