<?php
/* @var $this AttendController */
/* @var $model Attend */

$this->breadcrumbs=array(
	'Attends'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Attend', 'url'=>array('index')),
	array('label'=>'Create Attend', 'url'=>array('create')),
	array('label'=>'View Attend', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Attend', 'url'=>array('admin')),
);
?>

<h1>Update Attend <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>