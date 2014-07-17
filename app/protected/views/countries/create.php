<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 17/07/14
 * Time: 12:36 PM
 */
?>

<h1>Create Countries</h1>
<!--Widget del framework para crear formularios->
<!--En este caso $this es CountriesController-->

<div class="form">
    <?php $form=$this->beginWidget("CActiveForm"#,array(
        #'id'=>'login-form',
        #'enableClientValidation'=>true,
        #'clientOptions'=>array(
        #    'validateOnSubmit'=>true,
        #),
    );?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <div class="row">
            <!--Creando una etiqueta para el campo-->
            <?php echo $form->labelEx($model,'name'); ?>
            <!--Creando un campo de texto que se le pasa el modelo y nombre del campo-->
            <?php echo $form->textField($model,"name");?>
            <!--Etiqueta error, para que muestre los errores con el modelo y nombre del campo-->
            <?php echo $form->error($model,"name");?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,"status");?>
            <?php echo $form->textField($model,"status");?>
            <?php echo $form->error($model,"status");?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton("Create");?>
        </div>

    <!--Finalizando Widget-->
    <?php $this->endWidget();?>
</div>