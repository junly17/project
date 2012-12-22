<?php
/* @var $this CourseController */
/* @var $model Course */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'courseCode'); ?>
		<?php echo $form->textField($model,'courseCode',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'courseName'); ?>
		<?php echo $form->textField($model,'courseName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numOfweek'); ?>
		<?php echo $form->textField($model,'numOfweek'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'semesterId'); ?>
		<?php 
			echo $form->dropDownList($model, 'semesterId', CHtml::listData( Semester::model()->findAll(), 'id', 'name' ));
		?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->