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
				#Definiendo los campos requeridos. Personalizar mensaje con 'message' {}refiere al atributo seleccionado
				array("name,type","required","message"=>"Campo requerido {attribute}"),
				
				#Consultando al modelo(BD) si existen los datos
				array("description","unique","attributeName"=>"username","className"=>"Users"),

				#Seteando por filtros. Filtrando
				#array("description","filter","filter"=>"strtolower"),

				#[EJEMPLO] Validando la descripcion, que sea numerica y solo enteros con un mensaje personalizado
				#array("description","numerical",'integerOnly'=>true,'message'=>'Pon un entero sucio!'),
				
				/*Regla de validacion para los datos que no tienen regla de validacion 'safe'
				*Se pueden agregar mas parametros que se pueden setear en la clase, que tienen que ser propiedades de la clase
				*en este caso MyValidator
				*/
				#array("description","ext.MyValidator","description"=>"this"),
			);
	}

	#Creando validaciones personalizadas recibiendo 2 parametros. '$attribute y $params. Funcion de ejemplo

	
/*
	public function validacion($attribute,$params)
	{
		#Se emplea la condicion
		if($this->attribute=="test")
		{
			#Entonces se muestra el error mediante el metodo addError. Con el atributo  mensaje
			$this->addError($attribute,"Mensaje");
		}
	}*/

}