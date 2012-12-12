<?php
/* @var $this CourseruleController */
/* @var $model Courserule */
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
		<?php echo $form->label($model,'lateTime'); ?>
		<?php echo $form->textField($model,'lateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'absenceTime'); ?>
		<?php echo $form->textField($model,'absenceTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'condition'); ?>
		<?php echo $form->textField($model,'condition'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->