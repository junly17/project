<?php
/* @var $this StaffController */
/* @var $model Staff */

$this->breadcrumbs=array(
	'Home'=>array('admin/index'),
	'Staffs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Staff', 'url'=>array('index')),
	array('label'=>'Create Staff', 'url'=>array('create')),
	array('label'=>'View Staff', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Staff', 'url'=>array('admin')),
);
?>

<h1>Update Staff <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'update'=>true)); ?>