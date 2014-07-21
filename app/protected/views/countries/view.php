<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 17/07/14
 * Time: 09:48 PM
 */
?>

<h1>Detailed view of countries</h1>

<table class="table">
    <tr>
        <td><strong>ID</strong></td>
        <td><?php echo $model->id?></td>
    </tr>
    <tr>
        <td><strong>Name</strong></td>
        <td><?php echo $model->name?></td>
    </tr>
    <tr>
        <td><strong>Status</strong></td>
        <!--Clase dinamica en Bootstrap-->
        <td><span class="label label-<?php echo $model->status==1?"info":"warning";?>"><?php echo $model->status==1?"Enabled":"Disable";?></span></td>
    </tr>

</table>