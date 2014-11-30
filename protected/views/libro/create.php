<?php
/* @var $this LibroController */
/* @var $model Libro */

$this->breadcrumbs=array(
	'Libros'=>array('/libro'),
	'Crear',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,)); ?>