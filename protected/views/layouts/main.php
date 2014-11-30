<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
        
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <link rel="shortcut icon" href="../lybo/css/img/ico.png"></link>
	<title>Lybo</title>
</head>

<body style="background-color: #011;">

<div class="container" id="page" style="border:1px solid #e0f0f0; border-radius:3px 3px 10px 10px; width:97%; height:98%;">

	<div id="header" style="border: none; width:100%;">
		<div id="log" style="padding: 3px 10px;">
                    <img src="../lybo/css/img/Lybochico.jpg" style="width:15%"></img>
                    <img src="../lybo/css/img/lib-header.png" style="width:84%; height:100px; margin-left: 5px;"></img>
                </div>
                
	</div><!-- header -->

	<div id="mainmenu">
                <?php
                $empleado = Empleado::model()->findAllByAttributes(array('idusuario'=>Yii::app()->user->id));
                if(Yii::app()->user->getState('admin')){
                    $empleado=FALSE;
                    $admin=TRUE;
                }
                else
                    $admin=FALSE;
                $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site')),
				array('label'=>'Bibliotecas', 'url'=>array('/biblioteca')),
				array('label'=>'Libros', 'url'=>array('/libro')),
                                array('label'=>'Usuarios', 'url'=>array('/usuarios'), 'visible'=>$admin),
                                array('label'=>'Empleados/Socios', 'url'=>array('/usuarios'), 'visible'=>$empleado),
				array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::app()->user->getState('nombre').' '.Yii::app()->user->getState('apellido').' -Cerrar sesión-', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
        
	<?php echo $content; ?>

        <div class="clear"></div>

	<div id="footer">
		Lybo fue creado en el marco del dictado de la materia <i>Trabajo Final</i>
                de la <i>Tecnicatura Superior/Universitaria en Desarrollo de Aplicaciones Web</i>.<br/>
                <a href="http://www.uncoma.edu.ar/">Universidad Nacional del Comahue</a>.<br/>
                <b>William U. Vallejos - Milton J. Encina</b><br/>
                -<?php echo date('Y');?>-<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>