<?php


class RHappy extends CApplicationComponent
{
	#Componentes también reciben parametros que son propiedades de la cclase, publicas

	public $saludo;

	#Metodo init para inicializar el componente
	public function init()
	{
		echo "Initializing R<br>";
	}

	public function hi()
	{
		if($this->saludo===null)
			return "Un saludo estimado Sr.";
		if($this->saludo===1)
			return "Ey que hay hombre";
	}
}