<?php

/**
* Clase de ejemplo para definir validaciones
*/
#Clase que extiende de la clase padre CValidator
class MyValidator extends CValidator
{
	
	public $description="shit";
	#Redefinir el metodo validateAttribute que recibe 2 parametros
	#Object que es el modelo al cual se le esta haciendo la validacion y el attributo que se le hace validacion
	public function validateAttribute($object,$attribute)
	{
		
		if($object->$attribute==$this->description)
		{
			#Si hay error, se llama al metodo addError
			#Acepta el objeto que es el modelo, el atributo y el mensaje de error
			$this->addError($object,$attribute,"This description is not valid");
		}
	}
}