<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idempleado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idempleado),array('view','id'=>$data->idempleado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idbiblioteca')); ?>:</b>
	<?php echo CHtml::encode($data->idbiblioteca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idusuario')); ?>:</b>
	<?php echo CHtml::encode($data->idusuario); ?>
	<br />


</div>