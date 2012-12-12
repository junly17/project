<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('studentCode')); ?>:</b>
	<?php echo CHtml::encode($data->studentCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('studentName')); ?>:</b>
	<?php echo CHtml::encode($data->studentName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('studentLastname')); ?>:</b>
	<?php echo CHtml::encode($data->studentLastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('studentStatus')); ?>:</b>
	<?php echo CHtml::encode($data->studentStatus); ?>
	<br />

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('userId')); ?>:</b>
	<?php echo CHtml::encode($data->userId); ?>
	<br /> -->


</div>