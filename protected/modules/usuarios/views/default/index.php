<?php
if(Yii::app()->user->getState('admin')===true)
$this->breadcrumbs = array(
    'Usuarios',
);
else
    $this->breadcrumbs = array(
    'Empleados/Socios',
);?>
<style>
    .pestania{
        color: #0088cc;
        background: #fafafa;
        border: 1px solid #e1e1e1;
        border-top-left-radius:10px;
        border-top-right-radius:10px;
        padding: 1% 11%;
        margin: 0;
        float: left;
    }
</style>


<?php 
Yii::app()->clientScript->registerScript('search', "
$('.vista').click(function(){
        if($(this).val()=='Administradores'){
            $('.vista').css({backgroundColor: '#fafafa', border: '1px solid #e1e1e1'});
            $(this).css({backgroundColor: '#e1e1e1', border: '1px solid #d0d0d0'});
            $('#administradores').css({display: 'block'});
            $('#empleados').css({'display':'none'});
            $('#socios').css({'display':'none'});
        }
        
        if($(this).val()=='Empleados      '){
           $('.vista').css({backgroundColor: '#fafafa', border: '1px solid #e1e1e1'});
           $(this).css({backgroundColor: '#e1e1e1', border: '1px solid #d0d0d0'});
           $('#empleados').css({'display':'block'});
           $('#administradores').css({'display':'none'});
           $('#socios').css({'display':'none'});
        }
        
        if($(this).val()=='Socios         '){
           $('.vista').css({backgroundColor: '#fafafa', border: '1px solid #e1e1e1'});
           $(this).css({backgroundColor: '#e1e1e1', border: '1px solid #d0d0d0'});
           $('#socios').css({'display':'block'});
           $('#administradores').css({'display':'none'});
           $('#empleados').css({'display':'none'});
        }

        return false;
    });");?>

<div style="margin:0;">
<?php if(Yii::app()->user->getState('admin')===true):?>
        <input type="button" value="Administradores" class="vista pestania" style="margin-left:2%;">
<?php endif;?>
      <input type="button" value="Empleados      " class="vista pestania"style="background-color: #e1e1e1; border: 1px solid #d0d0d0;">
      <input type="button" value="Socios         " class="vista pestania">
</div><br/><br/>

 <div id="administradores" class="well" style="display:none;">
    <?php
    if (Yii::app()->user->getState('admin') === true)
        echo CHtml::link('<span class="icon-plus-sign" style="margin:0 1%"></span> Crear Administrador', array('create'), array('class' => 'btn btn-success span5', 'style' => 'margin-left:28%;'));
    ?>
    <br/><br/>
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
                'template'=>'{delete}',
                'buttons' => array(
                    'delete' => array(
                        'label'=>'Baja',
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

<div id="empleados" class="well">
    <?php
        echo CHtml::link('<span class="icon-plus-sign" style="margin:0 1%"></span> Crear Empleado', array('empleado/create'), array('class' => 'btn btn-success span5', 'style' => 'margin-left:28%;'));?>
    <br/><br/>
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'empleado-grid',
        'type' => 'striped bordered condensed',
        'dataProvider' => $empleados->search(),
        'filter' => $empleados,
        'columns' => array(
            array('name' => 'dni',
                'header' => 'DNI',
                'value' => '$data->idusuario0->dni',
                'headerHtmlOptions' => array('width' => '23%'),
            ),
            array('name' => 'apellido',
                'header' => 'Apellido',
                'value' => '$data->idusuario0->apellido',
                'headerHtmlOptions' => array('width' => '23%'),
            ),
            array('name' => 'nombre',
                'header' => 'Nombre',
                'value' => '$data->idusuario0->nombre',
                'headerHtmlOptions' => array('width' => '23%'),
            ),
            array('name' => 'biblioteca',
                'filter' => CHtml::listData(Empleado::model()->findAll('idusuario=?', array(Yii::app()->user->id)), 'idbiblioteca0.nombre', 'idbiblioteca0.nombre'),
                'value' => '$data->idbiblioteca0->nombre',
                'headerHtmlOptions' => array('width' => '23%'),
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{view} {update} {delete}',
                'header'=>'Editar',
                'deleteButtonUrl'=> 'Yii::app()->createUrl("usuarios/empleado/delete&id=$data->idempleado" )',
                'updateButtonUrl'=> 'Yii::app()->createUrl("usuarios/empleado/update&id=$data->idempleado" )',
                'viewButtonUrl'=> 'Yii::app()->createUrl("usuarios/empleado/view&id=$data->idempleado" )',
            ),
        ),
    ));
    ?>
</div>
      
<div id="socios" class="well" style="display:none;">
    <?php
        echo CHtml::link('<span class="icon-plus-sign" style="margin:0 1%"></span> Crear Socio', array('socio/create'), array('class' => 'btn btn-success span5', 'style' => 'margin-left:28%;'));?>
    <br/><br/>
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'socio-grid',
        'type' => 'striped bordered condensed',
        'dataProvider' => $socios->search(),
        'filter' => $socios,
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
                'template' => '{view} {update} {delete}',
                'header'=>'Editar',
                'deleteButtonUrl'=> 'Yii::app()->createUrl("usuarios/socio/delete&id=$data->idsocio" )',
                'updateButtonUrl'=> 'Yii::app()->createUrl("usuarios/socio/update&id=$data->idsocio" )',
                'viewButtonUrl'=> 'Yii::app()->createUrl("usuarios/socio/view&id=$data->idsocio" )',
            ),
        ),
    ));
    ?>
</div>