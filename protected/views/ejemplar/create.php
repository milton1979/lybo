<?php
/* @var $this EjemplarController */
/* @var $model Ejemplar */
$this->breadcrumbs=array(
        'Libros'=>array('/libro'),
	$model->idlibro0->nombre=>array('libro/view','id'=>$_GET['libro']),
	'Crear ejemplar',
);?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>