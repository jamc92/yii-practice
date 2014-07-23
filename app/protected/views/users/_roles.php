<h1>Create Role</h1>

<div class="row-fluid">
	<div class="span6">
		
		<!--Si se quiere enviar el formulario a otro controlador se le envia como 2do parametro un array con el metodo creatreUrl-->
		<!--Para utilizar valiadciones con AJAX se debe enviar un ID. Para que se identifique cual es la peticion del formulario
		para validarlo y otros parametros por array-->
		<?php $form=$this->beginWidget("CActiveForm",array(
			'id'=>'role-form',
			'enableAjaxValidation'=>true,
			'clientOptions'=>array("validateOnSubmit"=>true)
		));?>

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
