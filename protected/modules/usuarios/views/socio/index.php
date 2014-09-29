<?php
$this->breadcrumbs=array(
	'Socios',
);

$this->menu=array(
array('label'=>'Create Socio','url'=>array('create')),
array('label'=>'Manage Socio','url'=>array('admin')),
);
?>

<h1>Socios</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
