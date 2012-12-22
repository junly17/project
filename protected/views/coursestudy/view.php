<?php
/* @var $this CoursestudyController */
/* @var $model Coursestudy */

$this->breadcrumbs=array(
	'Coursestudies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Coursestudy', 'url'=>array('index')),
	array('label'=>'Create Coursestudy', 'url'=>array('create')),
	array('label'=>'Update Coursestudy', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Coursestudy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coursestudy', 'url'=>array('admin')),
);
?>

<h1>View Coursestudy #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		array(
			'name'=>'courseId',
			'value'=>$model->course->fullname,
		),
		array(
			'name'=>'studentId',
			'value'=>$model->student->fullname,
		),
		'courseStatus',
		'sectionGroup',
	),
)); ?>
