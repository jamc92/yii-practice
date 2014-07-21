<?php

/**
* Los componente siempre deben estar basados en la clase CApplicationComponent
* O cualquier otra clase que este basado en esa
*/
class JMHappy extends CApplicationComponent
{
	#Metodo init para inicializar el componente
	public function init()
	{
		echo "Initializing JM<br>";
	}

	public function hi()
	{
		return "Hello Developer!";
	}
}

?>