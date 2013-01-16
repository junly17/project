<?php
/* @var $this CourseinfoController */
/* @var $data Courseinfo */
?>

<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->course->getAttributeLabel('course')); ?>:</b>
	<?php echo CHtml::encode($data->course->fullName); ?>
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
	<?php echo CHtml::encode($data->getDaysLabel()); ?>
	<br />

	<b><?php echo CHtml::encode($data->teacher->getAttributeLabel('teacher')); ?>:</b>
	<?php echo CHtml::encode($data->teacher->fullName); ?>
	<br />

</div>