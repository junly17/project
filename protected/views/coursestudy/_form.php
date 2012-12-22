<?php
/* @var $this CoursestudyController */
/* @var $model Coursestudy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coursestudy-form',
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
		<?php echo $form->labelEx($model,'studentId'); ?>
		<?php 
			echo $form->dropDownList($model, 'studentId', CHtml::listData( Student::model()->findAll(), 'id', 'fullname' ));
		?>
		<?php echo $form->error($model,'studentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'courseStatus'); ?>
		<?php 
			echo $form->dropDownList($model, 'courseStatus',array('Lecture'=>'Lecture','Laboratory'=>'Laboratory'));
		?>
		<?php echo $form->error($model,'courseStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sectionGroup'); ?>
		<?php echo $form->textField($model,'sectionGroup',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'sectionGroup'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->