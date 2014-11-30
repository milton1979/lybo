<?php
$this->breadcrumbs=array(
	'Empleados/Socios'=>array('/usuarios'),
        'Crear Socio',
);

echo $this->renderPartial('_form', array('model'=>$model, 'modelUs'=>$modelUs)); ?>