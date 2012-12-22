<?php
/* @var $this TeacherController */
/* @var $model Teacher */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'teacher-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php if(!isset($update)): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'teacherCode'); ?>
		<?php echo $form->textField($model,'teacherCode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'teacherCode'); ?>
	</div>
	<?php else: ?>
		<b><?php echo 'Teacher Code: '; ?></b>
		<?php echo $model->teacherCode; ?>
	<?php endif; ?>

	<div class="row">
		<?php echo $form->labelEx($model,'teacherName'); ?>
		<?php echo $form->textField($model,'teacherName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'teacherName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teacherLastname'); ?>
		<?php echo $form->textField($model,'teacherLastname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'teacherLastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teacherStatus'); ?>
		<?php 
			echo $form->dropDownList($model, 'teacherStatus',array('Taught'=>'Taught','Retire'=>'Retire'));
		?>
		<?php echo $form->error($model,'teacherStatus'); ?>
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