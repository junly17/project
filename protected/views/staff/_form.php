<?php
/* @var $this StaffController */
/* @var $model Staff */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'staff-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'staffCode'); ?>
		<?php echo $form->textField($model,'staffCode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'staffCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'staffName'); ?>
		<?php echo $form->textField($model,'staffName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'staffName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'staffLastname'); ?>
		<?php echo $form->textField($model,'staffLastname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'staffLastname'); ?>
	</div>

	<?php if(!isset($update)): ?>
	<div class="row">
		<?php echo $form->labelEx($user,'password'); ?>
		<?php echo $form->passwordField($user,'password'); ?>
		<?php echo $form->error($user,'password'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->