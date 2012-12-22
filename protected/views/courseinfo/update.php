<?php
/* @var $this CourseinfoController */
/* @var $model Courseinfo */

$this->breadcrumbs=array(
	'Courseinfos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Courseinfo', 'url'=>array('index')),
	array('label'=>'Create Courseinfo', 'url'=>array('create')),
	array('label'=>'View Courseinfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Courseinfo', 'url'=>array('admin')),
);
?>

<h1>Update Courseinfo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'update'=>true)); ?>