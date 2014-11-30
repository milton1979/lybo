<?php
$this->breadcrumbs = array(
    'Usuarios' => array('/usuarios'),
    'Administrar Socios',
);
?>
<div class="search-form">
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'socio-grid',
        'type' => 'striped bordered condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array('name' => 'idsocio',
                'header' => 'Nro socio',
                'value' => '$data->idsocio',
                'headerHtmlOptions' => array('width' => '11%'),
            ),
            array('name' => 'dni',
                'header' => 'DNI',
                'value' => '$data->idusuario0->dni',
                'headerHtmlOptions' => array('width' => '15%'),
            ),
            array('name' => 'apellido',
                'header' => 'Apellido',
                'value' => '$data->idusuario0->apellido',
                'headerHtmlOptions' => array('width' => '20%'),
            ),
            array('name' => 'nombre',
                'header' => 'Nombre',
                'value' => '$data->idusuario0->nombre',
                'headerHtmlOptions' => array('width' => '20%'),
            ),
            array('name' => 'biblioteca',
                'filter' => CHtml::listData(Empleado::model()->findAll('idusuario=?', array(Yii::app()->user->id)), 'idbiblioteca0.nombre', 'idbiblioteca0.nombre'),
                'value' => '$data->idbiblioteca0->nombre',
                'headerHtmlOptions' => array('width' => '25%'),
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{view} {update} {delete}'
            ),
        ),
    ));
    ?>
</div>