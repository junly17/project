<?php
/* @var $this CourseruleController */
/* @var $model Courserule */

$this->breadcrumbs=array(
	'Home'=>array('admin/index'),
	'Courserules'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Courserule', 'url'=>array('index')),
	array('label'=>'Manage Courserule', 'url'=>array('admin')),
);
?>

<h1>Create Courserule</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>