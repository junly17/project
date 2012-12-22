<?php
/* @var $this CourseruleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Courserules',
);

$this->menu=array(
	array('label'=>'Create Courserule', 'url'=>array('create')),
	array('label'=>'Manage Courserule', 'url'=>array('admin')),
);
?>

<h1>Courserules</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
