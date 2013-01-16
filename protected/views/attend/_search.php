<?php
/* @var $this AttendController */
/* @var $model Attend */
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
			echo $form->dropDownList($model, 'courseId', CHtml::listData( Course::model()->findAll(), 'id', 'fullName' ));
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'courseStatus'); ?>
		<?php 
			echo $form->dropDownList($model, 'courseStatus',array('Lecture'=>'Lecture','Laboratory'=>'Laboratory'));
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sectionGroup'); ?>
		<?php echo $form->textField($model,'sectionGroup',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'studentId'); ?>
		<?php 
			echo $form->dropDownList($model, 'studentId', CHtml::listData( Student::model()->findAll(), 'id', 'fullname' ));
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timeIn'); ?>
		<?php echo $form->textField($model,'timeIn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timeOut'); ?>
		<?php echo $form->textField($model,'timeOut'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'day'); ?>
		<?php echo CHtml::activeTextField($model,'day',array("id"=>"day")); ?>
		&nbsp;(calendar appears when textbox is clicked)
			<?php $this->widget('application.extensions.calendar.SCalendar',
			array(
			'inputField'=>'day',
			'ifFormat'=>'%Y-%m-%d',
			));
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'week'); ?>
		<?php echo $form->textField($model,'week'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->