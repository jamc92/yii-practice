<?php

#Clase para formulario que extiende de CFormModel
class RoleForm extends CFormModel
{
	#Propiedad estatica
	public static $types=array("Operation","Task","Role");
	#Propiedades que tendrán los campos del formulario
	public $name;
	public $description;
	public $type=2;

	public function rules()
	{
		return array(
				#Definiendo los campos requeridos
				array("name,type","required"),
				#Regla de validacion para los datos que no tienen regla de validacion 'safe'
				array("description","safe"),
			);
	}
}