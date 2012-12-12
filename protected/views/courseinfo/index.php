<?php
/* @var $this CourseinfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Admin'=>array('admin/index'),
	'Courseinfos',
);

$this->menu=array(
	array('label'=>'Create Courseinfo', 'url'=>array('create')),
	array('label'=>'Manage Courseinfo', 'url'=>array('admin')),
);
?>

<h1>Courseinfos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
