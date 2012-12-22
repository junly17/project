<?php
/* @var $this AttendController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Attends',
);

$this->menu=array(
	array('label'=>'Create Attend', 'url'=>array('create')),
	array('label'=>'Manage Attend', 'url'=>array('admin')),
);
?>

<h1>Attends</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
