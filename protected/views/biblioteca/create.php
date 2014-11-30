<?php
/* @var $this BibliotecaController */
/* @var $model Biblioteca */

$this->breadcrumbs=array(
	'Bibliotecas'=>array('admin'),
	'Registrar',
);

echo $this->renderPartial('_form', array('model'=>$model)); ?>