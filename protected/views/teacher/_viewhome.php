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
	
	<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton('สถานะการเข้าชั้นเรียนรายวัน',array('submit'=>array('teacher/firststudycourse','cid'=>$data['courseId'],'cstatus'=>$data['courseStatus'],'sec'=>$data['sectionGroup']))); ?>
		<?php echo CHtml::submitButton('สถานะการเข้าชั้นเรียนรายภาคการศึกษา',array('submit'=>array('teacher/studysemester','cid'=>$data['courseId'],'cstatus'=>$data['courseStatus'],'sec'=>$data['sectionGroup']))); ?>
		<?php echo CHtml::submitButton('ข้อกำหนดรายวิชา',array('submit'=>array('teacher/courserequire','cid'=>$data['courseId'],'cstatus'=>$data['courseStatus']))); ?>
	</div>


</div>
