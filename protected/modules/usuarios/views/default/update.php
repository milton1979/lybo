<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->nombre.' '.$model->apellido=>array('view','id'=>$model->id),
	'Actualizar',
);

echo $this->renderPartial('_update',array('model'=>$model)); ?>