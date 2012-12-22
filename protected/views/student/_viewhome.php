<div class="view">

	<b>Course:</b>
	<?php echo CHtml::encode($data['courseCode'].' '.$data['courseName']); ?>
	<br />

	<b>Course Status:</b>
	<?php echo CHtml::encode($data['courseStatus']); ?>
	<br />

	<b>Section Group:</b>
	<?php echo CHtml::encode($data['sectionGroup']); ?>
	<br />

	<b>Time Begin:</b>
	<?php echo CHtml::encode($data['timeBegin']); ?>
	<br />

	<b>Time Out:</b>
	<?php echo CHtml::encode($data['timeOut']); ?>
	<br />

	<b>Build:</b>
	<?php echo CHtml::encode($data['build']); ?>
	<br />

	<b>Room:</b>
	<?php echo CHtml::encode($data['room']); ?>
	<br />

	<b>Study Day:</b>
	<?php echo CHtml::encode($data['studyDay']); ?>
	<br />

	<b>Teacher:</b>
	<?php echo CHtml::encode($data['teacherName'].' '.$data['teacherLastname']); ?>
	<br />

	<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton('สถานะการเข้าชั้นเรียน',array('submit'=>array('student/studycourse','cid'=>$data['courseId'],'cstatus'=>$data['courseStatus'],'sec'=>$data['sectionGroup']))); ?>
	</div>


</div>