<?php
$this->breadcrumbs=array(
	'Home'=>array('student/home'),
	'CourseAttend'
);
?>

<h1 align="center">สถานะการเข้าชั้นเรียน</h1>
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

	<div><b>Teacher:</b>
	<?php echo $cinfo->teacher->fullName; ?></div>

	<div><b>Condition:</b>
	<?php echo $rule->condition; ?> %</div>

	<div><b>Course Total:</b>
	<?php echo $courseTotal[0]['total']; ?> Time</div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'day',
		'timeIn',
		'timeOut',
		'week',
		'attendStatus'
	),
)); 
?>

<div id="attend-sum">
เข้าเรียน: <span class="attend">0</span> &nbsp;&nbsp;
สาย: <span class="late">0</span> &nbsp;&nbsp;
ขาดเรียน: <span class="absent">0</span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
สิทธิ์ในการสอบ: <span class="qu"><?php echo $qualify[0]['qualified']; ?></span>
</div>
</br>
<a href="#" id="print">Print</a>

<script type="text/javascript">
	var attendCount = 0;
	var absentCount = 0;
	var lateCount = 0;
	$('#yw0 .items tr').each(function() {
		var text = $(this).find('td:last').text();
		if(text == 'Attend') {
			$(this).find('td:last').css('color','#05C405');
			attendCount++;
		}
		else if(text == 'Absent'){
			$(this).find('td:last').css('color','red');
			absentCount++;
		}
		else if(text == 'Late'){
			$(this).find('td:last').css('color','blue');
			lateCount++;
		}
	});
	$('#attend-sum span.qu').each(function() {
		var text = $(this).text();
		if(text == '1') {
			$(this).text('Qualified').css('color','#05C405');
		}
		else if(text == '0'){
			$(this).text('Not qualified').css('color','red');
		}
	});
	$('#attend-sum span.attend').text(attendCount).css('color','#05C405');
	$('#attend-sum span.late').text(lateCount).css('color','blue');
	$('#attend-sum span.absent').text(absentCount).css('color','red');
	$('#print').click(function() {
		window.print();
		return false;
	});
</script>