<?php
/* @var $this CoursestudyController */
/* @var $model Coursestudy */

$this->breadcrumbs=array(
	'Admin'=>array('admin/index'),
	'Coursestudies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coursestudy', 'url'=>array('index')),
	array('label'=>'Create Coursestudy', 'url'=>array('create')),
	array('label'=>'View Coursestudy', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Coursestudy', 'url'=>array('admin')),
);
?>

<h1>Update Coursestudy <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>