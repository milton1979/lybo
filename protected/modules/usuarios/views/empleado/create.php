<?php
$this->breadcrumbs=array(
	'Empleados/Socios'=>array('/usuarios'),
        'Crear Empleado',
);

echo $this->renderPartial('_form', array('model'=>$model, 'modelUs'=>$modelUs)); ?>
