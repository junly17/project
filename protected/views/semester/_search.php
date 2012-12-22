<?php
/* @var $this SemesterController */
/* @var $model Semester */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'semester'); ?>
		<?php echo $form->dropDownList($model,'semester',array('1'=>'ภาคเรียนที่ 1','2'=>'ภาคเรียนที่ 2', '3'=>'ภาคฤดูร้อน')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'openDate'); ?>
		<?php echo CHtml::activeTextField($model,'openDate',array("id"=>"openDate")); ?>
		&nbsp;(calendar appears when textbox is clicked)
			<?php $this->widget('application.extensions.calendar.SCalendar',
			array(
			'inputField'=>'openDate',
			'ifFormat'=>'%Y-%m-%d',
			));
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'endDate'); ?>
		<?php echo CHtml::activeTextField($model,'endDate',array("id"=>"endDate")); ?>
		&nbsp;(calendar appears when textbox is clicked)
			<?php $this->widget('application.extensions.calendar.SCalendar',
			array(
			'inputField'=>'endDate',
			'ifFormat'=>'%Y-%m-%d',
			));
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->dropDownList($model,'active',array('0'=>'Not active','1'=>'Active')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->