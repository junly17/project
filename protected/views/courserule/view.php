<?php
/* @var $this CourseruleController */
/* @var $model Courserule */

$this->breadcrumbs=array(
	'Home'=>array('admin/index'),
	'Courserules'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Courserule', 'url'=>array('index')),
	array('label'=>'Create Courserule', 'url'=>array('create')),
	array('label'=>'Update Courserule', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Courserule', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Courserule', 'url'=>array('admin')),
);
?>

<h1>View Courserule #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		array(
			'name'=>'courseId',
			'value'=>$model->course->fullname,
		),
		'lateTime',
		'absenceTime',
		'condition',
	),
)); ?>
