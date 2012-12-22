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
		<?php echo $form->label($model,'courseId'); ?>
		<?php 
			echo $form->dropDownList($model, 'courseId', CHtml::listData( Course::model()->findAll(), 'id', 'fullname' ));
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'courseStatus'); ?>
		<?php 
			echo $form->dropDownList($model, 'courseStatus',array('Lecture'=>'Lecture','Laboratory'=>'Laboratory'));
		?>
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