<?php
$this->breadcrumbs=array(
	'Socios'=>array('index'),
	$model->idsocio=>array('view','id'=>$model->idsocio),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Socio','url'=>array('index')),
	array('label'=>'Create Socio','url'=>array('create')),
	array('label'=>'View Socio','url'=>array('view','id'=>$model->idsocio)),
	array('label'=>'Manage Socio','url'=>array('admin')),
	);
	?>

	<h1>Update Socio <?php echo $model->idsocio; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>