<?php
/* @var $this StaffController */
/* @var $data Staff */
?>

<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('staffCode')); ?>:</b>
	<?php echo CHtml::encode($data->staffCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staffName')); ?>:</b>
	<?php echo CHtml::encode($data->staffName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staffLastname')); ?>:</b>
	<?php echo CHtml::encode($data->staffLastname); ?>
	<br />

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('userId')); ?>:</b>
	<?php echo CHtml::encode($data->userId); ?>
	<br /> -->


</div>