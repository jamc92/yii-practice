<?php
	Yii::app()->clientscript
		// use it when you need it!

		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap.css' )
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )
		->registerCoreScript( 'jquery' )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-transition.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-alert.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-modal.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-dropdown.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-scrollspy.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tab.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tooltip.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-popover.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-button.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-collapse.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-carousel.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-typeahead.js', CClientScript::POS_END )

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="language" content="en" />
<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Le styles -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
<!-- Le fav and touch icons -->
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="/yii-practice/app"><?php echo Yii::app()->name ?></a>
				<div class="nav-collapse collapse">
					<?php $this->widget('zii.widgets.CMenu',array(
						'htmlOptions' => array( 'class' => 'nav' ),
						'activeCssClass'	=> 'active',
						'items'=>array(
							array('label'=>'Inicio', 'url'=>array('/site/index')),
							array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
							array('label'=>'Contact', 'url'=>array('/site/contact')),
                            //Vista de la opcion 'Usuarios' en el menu de navegacion, no visible para 'invitados'
                            array('label'=>'Users', 'url'=>array('/users'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'Countries', 'url'=>array('/countries'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
					)); ?>
					
				</div><!--/.nav-collapse -->
			</div><!--/.container-->
		</div><!--./navbar-inner-->
	</div><!--./navbar fixed-top-->
	
	<div class="cont">
	    <div class="container-fluid">
            <!--Mensaje de sesion. Primero se pregunta si existe mensaje de sesion-->
            <!--Se crea variable $msg para que se almacene si existe-->
            <?php if(($msg=Yii::app()->user->getFlashes())!==null):?>
            <!--Los mensajes de sesion son un array se recorren con foreach-->
            <?php foreach($msg as $type => $message):?>
            <div class="alert alert-<?php echo $type?>">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong><?php echo ucfirst($type)?>!</strong></h4>
                <?php echo $message?>
            </div>
            <?php endforeach;?>
            <?php endif;?>

          <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'homeLink'=>false,
                    'tagName'=>'ul',
                    'separator'=>'',
                    'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
                    'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
                    'htmlOptions'=>array ('class'=>'breadcrumb')
                )); ?>
            <!-- breadcrumbs -->
          <?php endif?>

        <?php echo $content ?>
	
	
        </div><!--/.fluid-container-->
    </div><!--./cont-->

	<div class="extra">
	  <div class="container-fluid" >
		<div class="row-fluid">
			<div class="col-md-3">
				<h4>Heading 1</h4>
				<ul>
					<li><a href="#">Subheading 1.1</a></li>
					<li><a href="#">Subheading 1.2</a></li>
					<li><a href="#">Subheading 1.3</a></li>
					<li><a href="#">Subheading 1.4</a></li>
				</ul>
			</div> <!-- /span3 -->

			<div class="col-md-3">
				<h4>Heading 2</h4>
				<ul>
					<li><a href="#">Subheading 2.1</a></li>
					<li><a href="#">Subheading 2.2</a></li>
					<li><a href="#">Subheading 2.3</a></li>
					<li><a href="#">Subheading 2.4</a></li>
				</ul>
			</div> <!-- /span3 -->

			<div class="col-md-3">
				<h4>Heading 3</h4>	
				<ul>
					<li><a href="#">Subheading 3.1</a></li>
					<li><a href="#">Subheading 3.2</a></li>
					<li><a href="#">Subheading 3.3</a></li>
					<li><a href="#">Subheading 3.4</a></li>
				</ul>
			</div> <!-- /span3 -->

			</div> <!-- /row -->
		</div> <!-- /container -->
	</div>

	<div class="footer">
	  <div class="container">
		<div class="row-fluid">
			<div id="footer-copyright" class="col-md-6">
				About us | Contact us | Terms & Conditions
			</div> <!-- /span6 -->
			<div id="footer-terms" class="col-md-6">
				© 2014 Madrid Javier. <a href="#">Enlace</a>.
			</div> <!-- /.span6 -->
		 </div> <!-- /row -->
	  </div> <!-- /container -->
	</div>
</body>
</html>
