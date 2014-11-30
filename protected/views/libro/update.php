<?php
/* @var $this LibroController */
/* @var $model Libro */

$this->breadcrumbs=array(
	'Libros'=>array('/libro'),
	$model->nombre=>array('view','id'=>$model->id),
	'Actualizar',
);

echo $this->renderPartial('_form', array('model'=>$model)); ?>