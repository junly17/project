<?php
/* @var $this TeacherController */
/* @var $model Teacher */

$this->breadcrumbs=array(
	'Home'=>array('admin/index'),
	'Teachers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Teacher', 'url'=>array('index')),
	array('label'=>'Manage Teacher', 'url'=>array('admin')),
);
?>

<h1>Create Teacher</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'user'=>$user)); ?>