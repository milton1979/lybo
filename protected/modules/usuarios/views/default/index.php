<?php
$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
array('label'=>'Crear Usuario','url'=>array('create')),
//array('label'=>'Update Usuario','url'=>array('update','id'=>$model->id)),
array('label'=>'Admin Usuario','url'=>array('admin')),
);
?>

<h2>Usuarios</h2>

<?php echo CHtml::link('Crear Administrador',array('create',));?>
<br/>
<?php echo CHtml::link('Crear Empleado',array('empleado/create',));?>

<?php /*$this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
));*/ ?>
