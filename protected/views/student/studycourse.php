<?php
$this->breadcrumbs=array(
	'Home'=>array('student/home'),
	'Coursestudy'
);
?>

<h1>สถานะการเข้าชั้นเรียน</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name'=>'studentId',
			'value'=>'$data->student->fullname',
		),
		'timeIn',
		'timeOut',
		'day',
		'week',
		'attendStatus'
	),
)); 
?>