<?php
/* @var $this BibliotecaController */
/* @var $model Biblioteca */

$this->breadcrumbs=array(
	'Bibliotecas'=>array('admin'),
	$model->nombre,
);

$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => $model->nombre ,
    'headerIcon' => 'icon-home',
    'htmlOptions' => array('class' => 'bootstrap-widget-table', 'style' => 'width: 60%; margin: 1% 20%;'),
));
?>
<table class="span6">
    <tbody>
        <!--<tr>
            <th colspan="2" class="label label-success span2" style="padding: 1% 35%; font-size:16px;">
                <a href="<?php echo $model->web;?>">WEB</a>
            </th> 
        </tr>-->
        <tr >
            <td> <span class="label label-info" style="width:55px;"> Horario </span> <?php echo $model->horario; ?></td>
            <td> <span class="label label-info" style="width:55px;"> Direcci&oacute;n </span> <?php echo $model->direccion; ?></td>
        </tr>
        <tr>
            <td> <span class="label label-info" style="width:55px;">Provincia </span> <?php echo $model->idciudad0->idprovincia0->nombre; ?></td>
            <td> <span class="label label-info" style="width:55px;">Ciudad </span> <?php echo $model->idciudad0->nombre; ?></td>
        </tr>
        <tr>
            <td> <span class="label label-info" style="width:55px;">Tel&eacute;fono </span> <?php echo $model->telefono; ?></td>
            <td> <span class="label label-info" style="width:55px;">Correo </span> <?php echo $model->email; ?></td>
        </tr>
    </tbody>
</table>
<?php $this->endWidget(); ?>