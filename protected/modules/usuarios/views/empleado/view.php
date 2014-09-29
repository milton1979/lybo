<?php
$this->breadcrumbs=array(
	'Empleados'=>array('index'),
	$model->idempleado,
);

$this->menu=array(
array('label'=>'List Empleado','url'=>array('index')),
array('label'=>'Create Empleado','url'=>array('create')),
array('label'=>'Update Empleado','url'=>array('update','id'=>$model->idempleado)),
array('label'=>'Delete Empleado','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idempleado),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Empleado','url'=>array('admin')),
);
?>

<h1>View Empleado #<?php echo $model->idempleado; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idempleado',
		'idbiblioteca',
		'idusuario',
),
)); ?>
