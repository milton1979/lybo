<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idsocio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idsocio),array('view','id'=>$data->idsocio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idbiblioteca')); ?>:</b>
	<?php echo CHtml::encode($data->idbiblioteca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idusuario')); ?>:</b>
	<?php echo CHtml::encode($data->idusuario); ?>
	<br />


</div>