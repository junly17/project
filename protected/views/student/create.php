<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Admin'=>array('admin/index'),
	'Students'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1>Create Student</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'user'=>$user)); ?>