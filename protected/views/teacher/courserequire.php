<?php
$this->breadcrumbs=array(
	'Home'=>array('teacher/home'),
	'Courserule'
);
?>

<h1>ข้อกำหนดรายวิชา</h1>

<?php $this->menu=array(
	array('label'=>'แก้ไขข้อกำหนดรายวิชา', 'url'=>array('updaterule','cid'=>$cid,'cstatus'=>$cstatus)),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewcourserequire',
)); ?>