<?php
/* @var $this CourseinfoController */
/* @var $model Courseinfo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'courseinfo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'courseId'); ?>
		<?php 
			echo $form->dropDownList($model, 'courseId', CHtml::listData( Course::model()->findAll(), 'id', 'fullName' ));
		?>
		<?php echo $form->error($model,'courseId'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'timeBegin'); ?>
		<?php echo $form->textField($model,'timeBegin'); ?>
		(ex. 08:00:00)
		<?php echo $form->error($model,'timeBegin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timeOut'); ?>
		<?php echo $form->textField($model,'timeOut'); ?>
		(ex. 08:00:00)
		<?php echo $form->error($model,'timeOut'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'build'); ?>
		<?php echo $form->textField($model,'build',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'build'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room'); ?>
		<?php echo $form->textField($model,'room',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'room'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'studyDay'); ?>
		<?php echo $form->checkBoxList($model,'studyDay',array(
	    	'0'=>'Sun',
	    	'1'=>'Mon',
	    	'2'=>'Tue',
	    	'3'=>'Wed',
	    	'4'=>'Thu',
	    	'5'=>'Fri',
	    	'6'=>'Sat'
	    )); ?>
		<?php echo $form->error($model,'studyDay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teacherId'); ?>
		<?php 
			echo $form->dropDownList($model, 'teacherId', CHtml::listData( Teacher::model()->findAll(), 'id', 'fullName' ));
		?>
		<?php echo $form->error($model,'teacherId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->