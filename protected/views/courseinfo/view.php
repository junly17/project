<?php
/* @var $this CourseinfoController */
/* @var $model Courseinfo */

$this->breadcrumbs=array(
	'Courseinfos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Courseinfo', 'url'=>array('index')),
	array('label'=>'Create Courseinfo', 'url'=>array('create')),
	array('label'=>'Update Courseinfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Courseinfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Courseinfo', 'url'=>array('admin')),
);
?>

<h1>View Courseinfo #<?php echo $model->id; ?></h1>

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
		'timeBegin',
		'timeOut',
		'build',
		'room',
		array(
			'name'=>'studyDay',
			'value'=>$model->getDaysLabel(),
		),
		array(
			'name'=>'teacherId',
			'value'=>$model->teacher->fullname,
		),
	),
)); ?>
