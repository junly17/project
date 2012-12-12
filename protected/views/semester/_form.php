<?php
/* @var $this SemesterController */
/* @var $model Semester */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'semester-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<?php echo $form->dropDownList($model,'semester',array('1'=>'ภาคเรียนที่ 1','2'=>'ภาคเรียนที่ 2', '3'=>'ภาคฤดูร้อน')); ?>
		<?php echo $form->error($model,'semester'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'openDate'); ?>
		<?php echo CHtml::activeTextField($model,'openDate',array("id"=>"openDate")); ?>
		&nbsp;(calendar appears when textbox is clicked)
			<?php $this->widget('application.extensions.calendar.SCalendar',
			array(
			'inputField'=>'openDate',
			'ifFormat'=>'%Y-%m-%d',
			));
		?>
		<?php echo $form->error($model,'openDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endDate'); ?>
		<?php echo CHtml::activeTextField($model,'endDate',array("id"=>"endDate")); ?>
		&nbsp;(calendar appears when textbox is clicked)
			<?php $this->widget('application.extensions.calendar.SCalendar',
			array(
			'inputField'=>'endDate',
			'ifFormat'=>'%Y-%m-%d',
			));
		?>
		<?php echo $form->error($model,'endDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->