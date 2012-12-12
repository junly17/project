<?php
/* @var $this CoursestudyController */
/* @var $model Coursestudy */

$this->breadcrumbs=array(
	'Admin'=>array('admin/index'),
	'Coursestudies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Coursestudy', 'url'=>array('index')),
	array('label'=>'Manage Coursestudy', 'url'=>array('admin')),
);
?>

<h1>Create Coursestudy</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>