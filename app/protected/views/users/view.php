<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(

	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>View Users #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
    //Definiendo el estilo de las vistas con diseño Bootstrap con array clave-valor al htmlOptions
    'htmlOptions'=>array("class"=>"table table-hover"),
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
	),
)); ?>

<h1>Create Role</h1>

<div class="row-fluid">
	<div class="span6">

		<?php $form=$this->beginWidget("CActiveForm")?>

		<?php echo $form->labelEx($role,"name");?>
		<?php echo $form->textField($role,"name");?>
		<?php echo $form->error($role,"name");?>

		<?php echo $form->labelEx($role,"description");?>
		<?php echo $form->textArea($role,"description");?>
		<?php echo $form->error($role,"description");?>

		<?php echo CHtml::submitButton("Create") ?>

		<?php $this->endWidget();?>

	</div>


	<div class="span6">
		<!--Vista para roles de permisos-->
			<ul class="nav nav-tabs nav-stacked">
				<!--Para cada registro, traer todas las filas de la tabla de la BD-->
				<?php foreach(Yii::app()->authManager->getAuthItems() as $data):?>
					<!--Si esta el nombre del usuario y su id asignarlo a $enabled-->
					<?php $enabled=Yii::app()->authManager->checkAccess($data->name,$model->id)?>
					<li>
						<!--Imprimir el nombre del usuario privilegiado-->
						<h4><?php echo $data->name?> 
							<small>
								<?php if($data->type==0) echo "Role";?>
								<?php if($data->type==1) echo "Tarea";?>
								<?php if($data->type==2) echo "Operacion";?>
							</small>
							<!--Link para ver el estado del usuario en vista detallada-->
							<!--Si esta activo o inactivo on/off segundo parametro la direccion del link y envia el id del modelo en la BD-->
							<!---->
							<?php echo CHtml::link($enabled?"Off":"On",array("users/assign","id"=>$model->id,"item"=>$data->name),
								#Clase para boton
								array("class"=>$enabled?"btn btn-primary":"btn"));?>
						</h4>
						<!--Mostrar la descripción en dado caso de que haya una-->
						<p><?php echo $data->description?></p>
						<hr>
					</li>
				<?php endforeach;?>
			</ul>
	
	</div>

</div>
