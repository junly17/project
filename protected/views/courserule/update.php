<?php
/* @var $this CourseruleController */
/* @var $model Courserule */

$this->breadcrumbs=array(
	'Admin'=>array('admin/index'),
	'Courserules'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Courserule', 'url'=>array('index')),
	array('label'=>'Create Courserule', 'url'=>array('create')),
	array('label'=>'View Courserule', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Courserule', 'url'=>array('admin')),
);
?>

<h1>Update Courserule <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>