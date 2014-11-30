<?php
if(Yii::app()->user->getState('admin')===true)
    $this->breadcrumbs = array(
    'Usuarios' => array('/usuarios'),
    'Ver Socio',
);
else
    $this->breadcrumbs = array(
    'Empleados/Socios' => array('/usuarios'),
    'Ver Socio',
);

$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => $model->idusuario0->nombre . ' ' . $model->idusuario0->apellido,
    'headerIcon' => 'icon-user',
    'htmlOptions' => array('class' => 'bootstrap-widget-table', 'style' => 'width: 60%; margin: 1% 20%;'),
));
?>
<table class="span6">
    <tbody>
        <tr>
            <th colspan="2" class="label label-success span2" style="padding: 1% 35%; font-size:16px;">
                Nro socio <?php echo $model->idsocio; ?>
            </th> 
        </tr>
        <tr >
            <td> <span class="label label-info" style="width:55px;"> DNI </span> <?php echo $model->idusuario0->dni; ?></td>
            <td> <span class="label label-info" style="width:55px;"> Direcci&oacute;n </span> <?php echo $model->idusuario0->direccion; ?></td>
        </tr>
        <tr>
            <td> <span class="label label-info" style="width:55px;">Ciudad </span> <?php echo $model->idusuario0->idciudad0->nombre; ?></td>
            <td> <span class="label label-info" style="width:55px;">Provincia </span> <?php echo $model->idusuario0->idciudad0->idprovincia0->nombre; ?></td>
        </tr>
        <tr>
            <td> <span class="label label-info" style="width:55px;">Telefono </span> <?php echo $model->idusuario0->telefono; ?></td>
            <td> <span class="label label-info" style="width:55px;">Correo </span> <?php echo $model->idusuario0->email; ?></td>
        </tr>
    </tbody>
</table>
<?php $this->endWidget(); ?>