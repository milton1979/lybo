<?php
$this->breadcrumbs=array(
	'Socios'=>array('index'),
	$model->idsocio,
);

$this->menu=array(
array('label'=>'List Socio','url'=>array('index')),
array('label'=>'Create Socio','url'=>array('create')),
array('label'=>'Update Socio','url'=>array('update','id'=>$model->idsocio)),
array('label'=>'Delete Socio','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idsocio),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Socio','url'=>array('admin')),
);
?>

<h1>View Socio #<?php echo $model->idsocio; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idsocio',
		'idbiblioteca',
		'idusuario',
),
)); ?>
