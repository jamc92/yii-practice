<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	#Declarando $_id privada
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		#Consulta de un solo registro de la tabla 'tbl_users' para $user
		#Asignando a minusucula lo que esta en la BD y lo que el usuario ingresa
		$user=Users::model()->find("LOWER(username)=?",array(strtolower($this->username)));

		#Si no encuentra el usuario envía NULL
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		#Comparando si la contraseña que ingreso es correcta a la guardada en la BD
		#Si la clave cifrada con md5 NO ES LA MISMA que la cifrada en la BD con md5, devuelve error
		elseif(md5($this->password)!==$user->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			#Al _id de este controlador se le asigna el id de usuario
			$this->_id=$user->id;
			#Se setea el estado de este controlador para el email de $user->email
			$this->setState("email",$user->email);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	#Funcion para obtener ID del usuario
	public function getId()
	{
		#Retorn el id del nombre de usuario
		return $this->_id;
	}
}