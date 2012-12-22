<?php
/* @var $this AttendController */
/* @var $model Attend */

$this->breadcrumbs=array(
	'Attends'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Attend', 'url'=>array('index')),
	array('label'=>'Manage Attend', 'url'=>array('admin')),
);
?>

<h1>Create Attend</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>