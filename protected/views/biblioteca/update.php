<?php
/* @var $this BibliotecaController */
/* @var $model Biblioteca */

$this->breadcrumbs=array(
	'Bibliotecas'=>array('admin'),
	$model->nombre=>array('view','id'=>$model->idbiblioteca),
	'Actualizar datos',
);

echo $this->renderPartial('_form', array('model'=>$model)); ?>