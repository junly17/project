<?php
/* @var $this CoursestudyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Coursestudies',
);

$this->menu=array(
	array('label'=>'Create Coursestudy', 'url'=>array('create')),
	array('label'=>'Manage Coursestudy', 'url'=>array('admin')),
);
?>

<h1>Coursestudies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
