<div class="view">

	<b><?php echo CHtml::encode($data->course->getAttributeLabel('course')); ?>:</b>
	<?php echo CHtml::encode($data->course->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('courseStatus')); ?>:</b>
	<?php echo CHtml::encode($data->courseStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lateTime')); ?>:</b>
	<?php echo CHtml::encode($data->lateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('absenceTime')); ?>:</b>
	<?php echo CHtml::encode($data->absenceTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('condition')); ?>:</b>
	<?php echo CHtml::encode($data->conditionRule); ?> %
	<br />


</div>