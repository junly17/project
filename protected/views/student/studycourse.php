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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
สิทธิ์ในการสอบ: <span class="qu">0</span>
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
	$('#attend-sum span.attend').text(attendCount).css('color','#05C405');
	$('#attend-sum span.late').text(lateCount).css('color','blue');
	$('#attend-sum span.absent').text(absentCount).css('color','red');
	$('#print').click(function() {
		window.print();
		return false;
	});
</script>