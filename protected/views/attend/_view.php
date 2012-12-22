<?php
/* @var $this AttendController */
/* @var $data Attend */
?>

<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->course->getAttributeLabel('course')); ?>:</b>
	<?php echo CHtml::encode($data->course->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('courseStatus')); ?>:</b>
	<?php echo CHtml::encode($data->courseStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sectionGroup')); ?>:</b>
	<?php echo CHtml::encode($data->sectionGroup); ?>
	<br />

	<b><?php echo CHtml::encode($data->student->getAttributeLabel('student')); ?>:</b>
	<?php echo CHtml::encode($data->student->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timeIn')); ?>:</b>
	<?php echo CHtml::encode($data->timeIn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timeOut')); ?>:</b>
	<?php echo CHtml::encode($data->timeOut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day')); ?>:</b>
	<?php echo CHtml::encode($data->day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('week')); ?>:</b>
	<?php echo CHtml::encode($data->week); ?>
	<br />

</div>