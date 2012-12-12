<?php
/* @var $this CourseController */
/* @var $model Course */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'courseCode'); ?>
		<?php echo $form->textField($model,'courseCode',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'courseCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'courseName'); ?>
		<?php echo $form->textField($model,'courseName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'courseName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numOfweek'); ?>
		<?php echo $form->textField($model,'numOfweek'); ?>
		<?php echo $form->error($model,'numOfweek'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semesterId'); ?>
		<?php 
			echo $form->dropDownList($model, 'semesterId', CHtml::listData( Semester::model()->findAll(), 'id', 'name' ));
		?>
		<?php echo $form->error($model,'semesterId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->