<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'List Usuario','url'=>array('index')),
array('label'=>'Update Usuario','url'=>array('update','id'=>$model->id)),
array('label'=>'Manage Usuario','url'=>array('admin')),
);
?>

<!--<h1>Create Usuario</h1>-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>