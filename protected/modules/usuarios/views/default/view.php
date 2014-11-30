<?php
$this->breadcrumbs = array(
    'Usuarios' => array('/usuarios'),
    'Ver Administrador',
);

$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => $model->nombre . ' ' . $model->apellido,
    'headerIcon' => 'icon-user',
    'htmlOptions' => array('class' => 'bootstrap-widget-table', 'style' => 'width: 60%; margin: 1% 20%;'),
));
?>

<table class="span6">
    <tbody>
        <tr >
            <td> <span class="label label-info" style="width:55px;"> DNI </span> <?php echo $model->dni; ?></td>
            <td> <span class="label label-info" style="width:55px;"> Direcci&oacute;n </span> <?php echo $model->direccion; ?></td>
        </tr>
        <tr>
            <td> <span class="label label-info" style="width:55px;">Ciudad </span> <?php echo $model->idciudad0->nombre; ?></td>
            <td> <span class="label label-info" style="width:55px;">Provincia </span> <?php echo $model->idciudad0->idprovincia0->nombre; ?></td>
        </tr>
        <tr>
            <td> <span class="label label-info" style="width:55px;">Tel&eacute;fono </span> <?php echo $model->telefono; ?></td>
            <td> <span class="label label-info" style="width:55px;">Correo </span> <?php echo $model->email; ?></td>
        </tr>
    </tbody>
</table>
<?php $this->endWidget(); ?>