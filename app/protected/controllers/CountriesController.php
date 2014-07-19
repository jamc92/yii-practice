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
        #---------------COMPONENTES / COMPONENTS----------------

        #Llamando al componente por su alias 'happy' y la funcion a utilizar 'hi()'
        /*echo Yii::app()->happy->hi()."<br>";

        #Seteando en tiempo de ejecucion
        Yii::app()->happy->saludo=null;
        echo Yii::app()->happy->hi()."<br>";

        #Llamando otro componente de diferente alias
        echo Yii::app()->sad->hi();

        #-------------------------------------------------------

        #-------------------PATH ALIAS & IMPORTS
*/
        #Llamando el path alias global declarado en el archivo main.php
        #Yii::import("me.*");
        /*
         * Invocando las clases importadas
        $class=new Test;
        echo $class->hi();
        $class2=new Test2;
        echo $class2->bye();
        */

        #Importando clases con Yii con PATH Alias
        #Yii::import("application.Test");

        #Equivalencia de importar
        #include(Yii::getPathOfAlias("application")."/Test.php");

        #getPathOfAlias devuelve strings de direcciones dentro de la carpeta de aplicacion
        #include(Yii::getPathOfAlias("application")).<br>; //Protected
        #include(Yii::getPathOfAlias("webroot")).<br>; //Root, carpeta raiz.
        #include(Yii::getPathOfAlias("ext"));.<br>// protected extension
        #include(Yii::getPathOfAlias("zii"));.<br>// framework/zii

        #---------------------------------------------------------

        #---------------COMPONENTES  REQUEST/ COMPONENTS REQUEST----------------
        #Request esta basado en la clase CHttpRequest

        #if(Yii::app()->request->isAjaxRequest) //Si se usa Ajax
        #if(Yii::app()->request->isPostRequest) //Si viene datos por Post
        
        #Si esta vacio se le puede asignar un valor por defecto
        
        #$test=Yii::app()->request->getPost("test","defaultValue"); //Uso de POST[]
        #$test=Yii::app()->request->getQuery("test","defaultValue"); //Uso de GET[]
        #$test=Yii::app()->request->getParam("test","defaultValue"); // $_POST[test"test"] $_GET["test"]

        #Variables para poder acceder a los valores de los PATH y rutas

        #echo Yii::app()->request->baseUrl."<br>"; //URL de la app
        #echo Yii::app()->request->requestUri."<br>"; //Carpeta local
        #echo Yii::app()->request->pathinfo."<br>"; //Archivo local
        #echo Yii::app()->request->urlReferrer."<br>"; // 
        #echo Yii::app()->request->queryString."<br>"; //Muestra URL en query String
        #echo Yii::app()->request->userAgent."<br>"; //Datos del Usuario de acceso
        #echo Yii::app()->request->userHost."<br>"; //Direccion del Servidor
        #echo Yii::app()->request->userHostAddress."<br>"; //Direccion del Host

        #Para cabeceras y exportaciones
        #Yii::app()->request->sendFile("")."<br>";



        #-----------------------------------------------------------------------


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
                #Mensaje de guardado con exixto
                Yii::app()->user->setFlash("success","Pais creado correctamente");

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
                    Yii::app()->user->setFlash("success","Pais actualizado correctamente");
                    $this->redirect(array("index"));
                }
                else
                {
                    Yii::app()->user->setFlash("warning","Error al actualizar pais");
                }
            }
            $this->render("update",array("model"=>$model));
        }

        #Accion Eliminar
        public function actionDelete($id)
        {
            $model=Countries::model()->deleteByPk($id);
            $this->redirect(array("index"));
        }

        #Accion Vista
        public function actionView($id)
        {
            $model=Countries::model()->findByPk($id);
            $this->render("view",array("model"=>$model));
        }

        #Accion Activar/Desactivar
        public function actionEnable($id)
        {
            $model=Countries::model()->findByPk($id);
            if($model->status==1)

                $model->status=0;
            else
                $model->status=1;

            $model->save();
            $this->redirect(array("index"));

        }
}