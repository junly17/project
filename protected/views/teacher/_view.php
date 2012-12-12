<?php
/* @var $this TeacherController */
/* @var $data Teacher */
?>

<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('teacherCode')); ?>:</b>
	<?php echo CHtml::encode($data->teacherCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teacherName')); ?>:</b>
	<?php echo CHtml::encode($data->teacherName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teacherLastname')); ?>:</b>
	<?php echo CHtml::encode($data->teacherLastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teacherStatus')); ?>:</b>
	<?php echo CHtml::encode($data->teacherStatus); ?>
	<br />

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('userId')); ?>:</b>
	<?php echo CHtml::encode($data->userId); ?>
	<br /> -->


</div>