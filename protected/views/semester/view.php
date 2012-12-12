<?php
/* @var $this SemesterController */
/* @var $model Semester */

$this->breadcrumbs=array(
	'Admin'=>array('admin/index'),
	'Semesters'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Semester', 'url'=>array('index')),
	array('label'=>'Create Semester', 'url'=>array('create')),
	array('label'=>'Update Semester', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Semester', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Semester', 'url'=>array('admin')),
);
?>

<h1>View Semester #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'semester',
		'year',
		'openDate',
		'endDate',
		'name',
	),
)); ?>
