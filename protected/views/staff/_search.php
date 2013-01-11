<?php
/* @var $this StaffController */
/* @var $model Staff */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row">
		<?php echo $form->label($model,'staffCode'); ?>
		<?php echo $form->textField($model,'staffCode',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staffName'); ?>
		<?php echo $form->textField($model,'staffName',array('size'=>25,'maxlength'=>35)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'staffLastName'); ?>
		<?php echo $form->textField($model,'staffLastname',array('size'=>25,'maxlength'=>35)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->