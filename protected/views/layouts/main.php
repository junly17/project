<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
			$role = Yii::app()->user->isGuest? 'guest': Yii::app()->user->role;
			$items = array(
				array('label'=>'Home', 'url'=>array('/site/index'),'visible'=>Yii::app()->user->isGuest),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			);
			if($role == 'student') {
				$items = array(
					array('label'=>'Home', 'url'=>array('/student/home'), 'visible'=>true),
					array('label'=>'Change Password', 'url'=>array('/site/changePassword'), 'visible'=>true),
					array('label'=>'Logout ('.Yii::app()->user->name.' : Student)', 'url'=>array('/site/logout'), 'visible'=>true)	
				);
			}
			else if($role == 'teacher') {
				$items = array(
					array('label'=>'Home', 'url'=>array('/teacher/home'), 'visible'=>true),
					array('label'=>'Change Password', 'url'=>array('/site/changePassword'), 'visible'=>true),
					array('label'=>'Logout ('.Yii::app()->user->name.' : Teacher)', 'url'=>array('/site/logout'), 'visible'=>true)
				);
			}
			else if($role == 'staff') {
				$items = array(
					array('label'=>'Home', 'url'=>array('/staff/home'), 'visible'=>true),
					array('label'=>'Change Password', 'url'=>array('/site/changePassword'), 'visible'=>true),
					array('label'=>'Logout ('.Yii::app()->user->name.' : Staff)', 'url'=>array('/site/logout'), 'visible'=>true)
				);
			}
			else if($role == 'admin') {
				$items = array(
					array('label'=>'Home', 'url'=>array('/admin/index'), 'visible'=>true),
					array('label'=>'Logout (Admin)', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				);
			}
			
			$this->widget('zii.widgets.CMenu',array(
			'items'=> $items,
		)); ?>
	</div><!-- mainmenu -->
	<?php if(count($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>(isset($this->homeUrl) ? $this->homeUrl : '')
			//'homeLink' => CHtml::link('Admin',array('/admin/index')),
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Computer Science<br/>
		Thammasat University<br/>
		2012<br/>
	   <!-- Copyright &copy; by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?> -->
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
