<?php
/* @var $this CoursestudyController */
/* @var $data Coursestudy */
?>

<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->course->getAttributeLabel('course')); ?>:</b>
	<?php echo CHtml::encode($data->course->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->student->getAttributeLabel('student')); ?>:</b>
	<?php echo CHtml::encode($data->student->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sectionGroup')); ?>:</b>
	<?php echo CHtml::encode($data->sectionGroup); ?>
	<br />


</div>