<?php
/* @var $this BibliotecaController */
/* @var $model Biblioteca */
$this->breadcrumbs = array(
    'Bibliotecas',
);
?>
<div class="well">
    <?php
    if (Yii::app()->user->getState('admin') === true)
        echo CHtml::link('<span class="icon-plus-sign" style="margin:0 1%"></span> Crear biblioteca', array('create'), array('class' => 'btn btn-success span5', 'style' => 'margin-left:28%;'));
    ?>

    <br/>
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'biblioteca-grid',
        'type' => 'striped bordered condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'nombre',
            'direccion',
            array('name' => 'idciudad0', 'value' => '$data->idciudad0->nombre', 'filter'=>'$data->idciudad0->nombre'),
            array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'header'=>'Ver',
                    'template'=>'{view}',
            ),
            array(
                'header' => 'Administrar',
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template'=>'{update} {delete}',
                'visible'=> Yii::app()->user->getState('admin')? true : false,
            )
        )
       )
    );
    ?>
</div><!-- search-form -->