<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
        'Crear Administrador',
);

echo $this->renderPartial('_form', array('model'=>$model)); ?>