<?php
/**
 * Creando Modelo para hacer funcionar CRUD
 * Created by PhpStorm.
 * User: javier
 * Date: 17/07/14
 * Time: 10:47 AM
 */

#Modelo de nombre Countries.php
#Clase que extiende de CActiveRecord

class Countries extends CActiveRecord
{
    #Creando metodo estatico para acceder al modelo
    public static function model($ClassName=__CLASS__)
    {
        #Llamando al padre que es CAcviteRecord que invoca al model que acepta un string con la clase del modelo
        return parent::model($ClassName);
    }

    #Nombre de la tabla para saber a donde tiene que apuntar el modelo
    public function tableName()
    {
        #Nombre de la tabla igual al del modelo pero en minusculas
        return "countries";
    }

    #Reglas de validacion
    public function rules()
    {
        #Campos de la tabla que seran requeridos
        return array(
            array("name, status","required"),
        );
    }
}