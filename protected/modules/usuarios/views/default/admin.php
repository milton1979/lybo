<?php
$this->breadcrumbs = array(
    'Usuarios' => array('/usuarios'),
    'Editar Administradores',
);

Yii::app()->getClientScript()->registerScript(
   "bajaScript","
    function bajaAdmin(e) {
        var url = $(this).attr('href');
        e.preventDefault();    // <-- esto evita el comportamiento por defecto del tag <A>
        alert(url);
        $.ajax({
                url: Yii::app()->createUrl('usuarios/default/delete',array('id'=>$model->id))',
                type: 'post',
                success: function(resp){ 
                       // todo bien, refrescamos el CGridView
                       $('#usuario-grid').yiiGridView('update');
                     },
                     error: function(e){
                        alert(e.responseText); // algo salio mal
                     }
                });

    }
",CClientScript::POS_HEAD);
?>



<div class="well">
    <?php
    if (Yii::app()->user->getState('admin') === true)
        echo CHtml::link('<span class="icon-plus-sign" style="margin:0 1%"></span> Crear Administrador', array('create'), array('class' => 'btn btn-success span5', 'style' => 'margin-left:28%;'));
    ?>

    <br/>
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'usuario-grid',
        'type' => 'striped bordered condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array('name' => 'dni',
                'header' => 'DNI',
                'value' => '$data->dni',
                'headerHtmlOptions' => array('width' => '23%'),
            ),
            array('name' => 'apellido',
                'header' => 'Apellido',
                'value' => '$data->apellido',
                'headerHtmlOptions' => array('width' => '23%'),
            ),
            array('name' => 'nombre',
                'header' => 'Nombre',
                'value' => '$data->nombre',
                'headerHtmlOptions' => array('width' => '23%'),
            ),
            array('name' => 'email',
                'header' => 'Correo',
                'value' => '$data->email',
                'headerHtmlOptions' => array('width' => '23%'),
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'header'=>'Admin',
                'template'=>'{administrador}',
                'buttons' => array(
                    'administrador' => array(
                        'click'=>new CJavaScriptExpression("bajaAdmin"),
                        'url'=>'CHtml::normalizeUrl(array("delete","id"=>$data->id))',
                        //'administradorButtonUrl'=>'Yii::app()->createUrl("usuarios/default/delete",array("id"=>$data->id))',
                        'label'=>'<span class="icon-ok"></span>',
                        'options'=>array('title'=>'Baja Administrador'),
                        'visible' => '($data->admin == 1 ) ? true : false',
                        ),
                    ),
                ),
            
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'header'=>'Admin',
                'template'=>'{delete}',
                'buttons' => array(
                    'delete' => array(
                        'label'=>'Baja',
                        //'options'=>array('style'=>'','class'=>'span3 icon-ok'),
                        'visible' => '($data->admin == 1 ) ? true : false',
                        ))  
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'header'=>'Editar',
                'template' => '{view} {update}',
            ),
        ),
      ));
    ?>
</div>