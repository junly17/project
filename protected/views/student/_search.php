<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'studentCode'); ?>
		<?php echo $form->textField($model,'studentCode',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'studentName'); ?>
		<?php echo $form->textField($model,'studentName',array('size'=>25,'maxlength'=>35)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'studentLastName'); ?>
		<?php echo $form->textField($model,'studentLastname',array('size'=>25,'maxlength'=>35)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'studentStatus'); ?>
		<?php 
			echo $form->dropDownList($model, 'studentStatus',array('Study'=>'Study','Retire'=>'Retire'));
		?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->