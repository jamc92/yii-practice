<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 17/07/14
 * Time: 11:00 AM
 */
#Creando clase del mismo nombre del archivo que extiende de Controller
class CountriesController extends Controller
{
    #Creando primera accion para insertar datos en una tabla
    public function actionIndex()
    {
        #Consultando la tabla accediendo directamente a la clase del modelo con el metodo estatico
        #Accede a todos los datos de la tabla
        $countries=Countries::model()->findAll();
        #Renderizando la vista, asignando variable en la vista con el resultado de la consulta
        $this->render("index",array("countries"=>$countries));
    }

    #Accion de crear
    public function actionCreate()
    {

        #Asignando el modelo countres a la variable
        $model=new Countries();

        if(isset($_POST["Countries"]))
        {
            /*Parametro del CActiveRecord llamado 'attributes' que recibe un array clave valor con los parametros de ese
            *model. Toma y hace un forcearh de ese array y va a setear todos los valores que traiga ese array con
            * los valores que equivalen a los campos del modelo.
            * En esta instancia del modelo ya se tienen los valores que se necesitan para guardar en la base de datos
            */

            $model->attributes=$_POST["Countries"];

            if($model->save())
            {
                #Si guardo, invoca al metodo del controlador de nombre 'redirect'. La equivalencia a 'header location'
                #Recibe un array que le dice a redirect que controlador va a renderizar y que parametros va a mandar por GET

                $this->redirect(array("index"));
            }
        }
        $this->render("create",array("model"=>$model));
    }

        #Accion de Actualizar
        public function  actionUpdate($id)
        {
            #Consultando registro por llave primaria del cual se quiere obtener la instancia
            $model=Countries::model()->findByPk($id);
            #Preugntando si vienen datos por post
            if(isset($_POST["Countries"]))
            {
                #Seteando todos los campos
                $model->attributes=$_POST["Countries"];
                #Actualizando el valor en la BD
                if($model->save())
                {
                    $this->redirect(array("index"));
                }
            }
            $this->render("update",array("model"=>$model));
        }

        public function actionDelete($id)
        {
            $model=Countries::model()->deleteByPk($id);
            $this->redirect(array("index"));
        }
}