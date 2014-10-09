<?php
$this->breadcrumbs=array(
	'Empleados'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Empleado','url'=>array('index')),
array('label'=>'Manage Empleado','url'=>array('admin')),
);
?>

<h1>Crear Empleado</h1>

<?php if(Yii::app()->user->hasFlash('success'))
        echo $this->renderPartial('../default/_form', array('model'=>$model, 'modelUs'=>$modelUs));
    else
        echo $this->renderPartial('_form', array('model'=>$model, 'modelUs'=>$modelUs)); ?>