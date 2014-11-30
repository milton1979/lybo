<?php

class PrestamoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($ejemplar, $tipo)
	{
            
		$model=new Prestamo;
                
                $ejemplar= Ejemplar::model()->findByPk($ejemplar);
                if($ejemplar===null)
                    throw new CHttpException('de datos','El ejemplar no esta disponible para esta operación.');
                else
                    $model->idejemplar=$ejemplar->id;
                if(!$ejemplar->disponibilidad):?>
                    <?php Yii::app()->user->setFlash('error', 'El ejemplar ya se encuentra prestado');?>
                <?php 
                endif;
                $tipo= Tipoprestamo::model()->findByPk($tipo);
                if($tipo===null)
			throw new CHttpException('de operación','La operación que esta intentando realizar no es valida.');
                else
                    $model->idtipo=$tipo->id;
                
                $this->performAjaxValidation($model);

                
                if(isset($_POST['Prestamo']))
		{
                    $model->attributes=$_POST['Prestamo'];
                    $model->observacion=$_POST['Prestamo']['observacion'];
                    $model->retiro=date('Y-m-d');
                    $ejemplar->disponibilidad=false;
                    if($model->retiro > $model->devolucion){
                        $model->retiro=null;
                        Yii::app()->user->setFlash('errorFecha', 'Por favor corrija los siguientes errores de ingreso:<br/><ul><li>La fecha de devolución es una fecha ya pasada.</li></ul>');
                    }
                    if($model->save()){
                        $ejemplar->update();
                        $this->redirect(array('view','id'=>$model->id));
                    }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Prestamo']))
		{
			$model->attributes=$_POST['Prestamo'];
                        $model->observacion=$_POST['Prestamo']['observacion'];
                        if($model->retiro > $model->devolucion)
                            Yii::app()->user->setFlash('errorFecha', 'Por favor corrija los siguientes errores de ingreso:<br/><ul><li>La fecha de devolución es una fecha ya pasada.</li></ul>');
                        else{
                            if($model->save())
				$this->redirect(array('view','id'=>$model->id));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$prestamo=$this->loadModel($id);
                $ejemplar=Ejemplar::model()->findByPk($prestamo->idejemplar);
                $ejemplar->disponibilidad=true;
                $ejemplar->save();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Prestamo('search');
		$model->unsetAttributes();  // clear any default values
                if(isset($_GET['ejemplar']))
                    $model->idejemplar = $_GET['ejemplar'];
		if(isset($_GET['Prestamo']))
                    $model->attributes=$_GET['Prestamo'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Prestamo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Prestamo']))
			$model->attributes=$_GET['Prestamo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Prestamo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Prestamo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Prestamo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prestamo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
