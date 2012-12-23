<?php
$this->breadcrumbs=array(
	'Home'=>array('teacher/home'),
	'Coursestudy'=>array('teacher/studycourse','cid'=>$cid,'cstatus'=>$cstatus,'sec'=>$sec)
);
?>

<h1>สถานะการเข้าชั้นเรียนรายวัน</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchCourse',array(
	'model'=>$model,
	'cid'=>$cid,
	'cstatus'=>$cstatus,
	'sec'=>$sec
)); ?>
</div><!-- search-form -->

<script type="text/javascript">
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
</script>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'studycourse-grid',
	'dataProvider'=>$model->searchCourse($cid,$cstatus,$sec,$studentName,$studentLastname),
	'filter'=>$model,
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

<?php $this->widget('application.extensions.print.printWidget', array(
                   'coverElement'=>'.dataGrid',
)); 
?>
