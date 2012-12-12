<?php
/* @var $this CourseController */
/* @var $data Course */
?>

<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('courseCode')); ?>:</b>
	<?php echo CHtml::encode($data->courseCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('courseName')); ?>:</b>
	<?php echo CHtml::encode($data->courseName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numOfweek')); ?>:</b>
	<?php echo CHtml::encode($data->numOfweek); ?>
	<br />

	<b><?php echo CHtml::encode($data->semester->getAttributeLabel('semester')); ?>:</b>
	<?php echo CHtml::encode($data->semester->name); ?>
	<br />


</div>