<?php

$this->breadcrumbs=array(
	'Home'=>array('teacher/home'),
	'Courserules'=>array('courserequire','cid'=>$model['courseId'],'cstatus'=>$model['courseStatus']),
	'Update',
);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'courserule-form',
	'enableAjaxValidation'=>false,
)); ?>
	<h1>แก้ไขข้อกำหนดรายวิชา</h1>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->hiddenField($model, 'id'); ?>
	<?php echo $form->hiddenField($model, 'courseId'); ?>

	<div class="row">
		<b><?php echo 'Course : '; ?></b>
		<?php echo $model->course->fullname; ?>
	</div>

	<div class="row">
		<b><?php echo 'Course Status : '; ?></b>
		<?php echo $model->courseStatus; ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lateTime'); ?>
		<?php echo $form->textField($model,'lateTime'); ?>
		(ex. 08:00:00)
		<?php echo $form->error($model,'lateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'absenceTime'); ?>
		<?php echo $form->textField($model,'absenceTime'); ?>
		(ex. 08:00:00)
		<?php echo $form->error($model,'absenceTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'condition'); ?>
		<?php echo $form->textField($model,'conditionRule'); ?>
		(%)
		<?php echo $form->error($model,'conditionRule'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->