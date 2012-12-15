<div class="view">


	<b><?php echo CHtml::encode($data->course->getAttributeLabel('course')); ?>:</b>
	<?php echo CHtml::encode($data->course->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('courseStatus')); ?>:</b>
	<?php echo CHtml::encode($data->courseStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sectionGroup')); ?>:</b>
	<?php echo CHtml::encode($data->sectionGroup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timeBegin')); ?>:</b>
	<?php echo CHtml::encode($data->timeBegin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timeOut')); ?>:</b>
	<?php echo CHtml::encode($data->timeOut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('build')); ?>:</b>
	<?php echo CHtml::encode($data->build); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room')); ?>:</b>
	<?php echo CHtml::encode($data->room); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('studyDay')); ?>:</b>
	<?php echo CHtml::encode($data->studyDay); ?>
	<br />

	<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton('สถานะการเข้าชั้นเรียนรายวัน',array('submit'=>array('teacher/studycourse'))); ?>
		<?php echo CHtml::submitButton('สถานะการเข้าชั้นเรียนรายภาคการศึกษา',array('submit'=>array('teacher/studysemester'))); ?>
		<?php echo CHtml::submitButton('เงื่อนไขสำหรับการศึกษาในรายวิชา',array('submit'=>array('teacher/courserequire'))); ?>
	</div>


</div>