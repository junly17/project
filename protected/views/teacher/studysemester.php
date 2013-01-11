<?php
$this->breadcrumbs=array(
	'Home'=>array('teacher/home'),
	'SemesterAttend',
);
?>

<h1 align="center">สถานะการเข้าชั้นเรียนรายภาคการศึกษา</h1>
<div class="view">
	<div><b>Course:</b>
	<?php echo $cinfo->course->fullName; ?></div>

	<div><b>Course Status:</b>
	<?php echo $cinfo->courseStatus; ?></div>

	<div><b>Section Group:</b>
	<?php echo $cinfo->sectionGroup; ?></div>

 	<div><b>Time Begin:</b>
 	<?php echo $cinfo->timeBegin; ?></div>

	<div><b>Time Out:</b>
	<?php echo $cinfo->timeOut; ?></div>

	<div><b>Build:</b>
	<?php echo $cinfo->build; ?></div>

	<div><b>Room:</b>
	<?php echo $cinfo->room; ?></div>

	<div><b>Study Day:</b>
	<?php echo $cinfo->studyDay; ?></div>

	<div><b>Condition:</b>
	<?php echo $rule->condition; ?> %</div>

	<div><b>Course Total:</b>
	<?php echo $courseTotal[0]['total']; ?> Time</div>

</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'studentCode',
		'studentName',
		'studentLastname',
		'onTime',
		'late',
		'absent',
		'totalAttend',
		'qualified'
	),
)); 
?>

<a href="#" id="print">Print</a>

<script type="text/javascript">
	$('#yw0 .items tr').each(function() {
		var text = $(this).find('td:last').text();
		if(text == '1') {
			$(this).find('td:last').text('Qualified').css('color','#05C405');
		}
		else if(text == '0'){
			$(this).find('td:last').text('Not qualified').css('color','red');
		}
	});
	$('#print').click(function() {
		window.print();
		return false;
	});
</script>
