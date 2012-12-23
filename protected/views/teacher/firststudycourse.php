<h2>สถานะการเข้าชั้นเรียนรายวัน</h2>
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
</div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attend-form',
	'enableAjaxValidation'=>false,
	'method'=>'get'
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Please select date '); ?>
		<?php echo CHtml::activeTextField($model,'day',array("id"=>"day")); ?>
		
		    <?php echo CHtml::submitButton('Search'); ?>
	   
			<?php $this->widget('application.extensions.calendar.SCalendar',
			array(
			'inputField'=>'day',
			'ifFormat'=>'%Y-%m-%d',
			));
		?>
		<?php echo $form->error($model,'day'); ?>
	</div>
		&nbsp;(calendar appears when textbox is clicked)


<?php $this->endWidget(); ?>

</div><!-- form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'studentCode',
		'studentName',
		'studentLastname',
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
</div>
<br/>
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