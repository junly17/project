<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'studentCode'); ?>
		<?php echo $form->textField($model,'studentCode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'studentCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'studentName'); ?>
		<?php echo $form->textField($model,'studentName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'studentName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'studentLastname'); ?>
		<?php echo $form->textField($model,'studentLastname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'studentLastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'studentStatus'); ?>
		<?php 
			echo $form->dropDownList($model, 'studentStatus',array('Study'=>'Study','Retire'=>'Retire'));
		?>
		<?php echo $form->error($model,'studentStatus'); ?>
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