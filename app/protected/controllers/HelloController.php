<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 07/07/14
 * Time: 08:43 PM
 */
#http://localhost/yii/hello/index

class HelloController extends Controller
{
    public function actionIndex()
    {
        $model=CActiveRecord::model("Users")->findAll();
        $twitter = "@codigofacilito";
        $this->render("index", array("model"=>$model,"twitter"=>$twitter));
    }
}