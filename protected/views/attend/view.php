<?php
/* @var $this AttendController */
/* @var $model Attend */

$this->breadcrumbs=array(
	'Attends'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Attend', 'url'=>array('index')),
	array('label'=>'Create Attend', 'url'=>array('create')),
	array('label'=>'Update Attend', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Attend', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Attend', 'url'=>array('admin')),
);
?>

<h1>View Attend #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		array(
			'name'=>'courseId',
			'value'=>$model->course->fullname,
		),
		'courseStatus',
		'sectionGroup',
		array(
			'name'=>'studentId',
			'value'=>$model->student->fullname,
		),
		'timeIn',
		'timeOut',
		'day',
		'week',
	),
)); ?>
