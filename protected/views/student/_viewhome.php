
<div class="view">


	<b><?php echo CHtml::encode($data->course->getAttributeLabel('course')); ?>:</b>
	<?php echo CHtml::encode($data->course->fullname); ?>
	<br />


	<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton('สถานะการเข้าชั้นเรียน',array('submit'=>array('student/studycourse'))); ?>
	</div>


</div>