<?php
/* @var $this CourseruleController */
/* @var $model Courserule */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'courserule-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'courseId'); ?>
		<?php 
			echo $form->dropDownList($model, 'courseId', CHtml::listData( Course::model()->findAll(), 'id', 'fullname' ));
		?>
		<?php echo $form->error($model,'courseId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'courseStatus'); ?>
		<?php 
			echo $form->dropDownList($model, 'courseStatus',array('Lecture'=>'Lecture','Laboratory'=>'Laboratory'));
		?>
		<?php echo $form->error($model,'courseStatus'); ?>
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