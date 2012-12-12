<?php
/* @var $this CourseinfoController */
/* @var $model Courseinfo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'courseId'); ?>
		<?php echo $form->textField($model,'courseId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'courseStatus'); ?>
		<?php echo $form->textField($model,'courseStatus',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sectionGroup'); ?>
		<?php echo $form->textField($model,'sectionGroup',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timeBegin'); ?>
		<?php echo $form->textField($model,'timeBegin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timeOut'); ?>
		<?php echo $form->textField($model,'timeOut'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'build'); ?>
		<?php echo $form->textField($model,'build',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room'); ?>
		<?php echo $form->textField($model,'room',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'studyDay'); ?>
		<?php echo $form->textField($model,'studyDay',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'teacherId'); ?>
		<?php echo $form->textField($model,'teacherId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->