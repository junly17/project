<?php
/* @var $this CourseinfoController */
/* @var $model Courseinfo */

$this->breadcrumbs=array(
	'Admin'=>array('admin/index'),
	'Courseinfos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Courseinfo', 'url'=>array('index')),
	array('label'=>'Manage Courseinfo', 'url'=>array('admin')),
);
?>

<h1>Create Courseinfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>