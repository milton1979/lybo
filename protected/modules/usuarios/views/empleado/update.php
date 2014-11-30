<?php
if(Yii::app()->user->getState('admin')===true)
    $this->breadcrumbs=array(
	'Usuarios'=>array('/usuarios'),
	$model->idusuario0->nombre.' '.$model->idusuario0->apellido=>array('view','id'=>$model->idempleado),
	'Actualizar datos',
);
else
$this->breadcrumbs=array(
	'Empleados/Socios'=>array('/usuarios'),
	$model->idusuario0->nombre.' '.$model->idusuario0->apellido=>array('view','id'=>$model->idempleado),
	'Actualizar datos',
);

echo $this->renderPartial('_update', array('model'=>$model, 'modelUs'=>$modelUs)); ?>