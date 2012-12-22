<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<input type="hidden" value="<?php echo $cid; ?>" name="cid">
	<input type="hidden" value="<?php echo $cstatus; ?>" name="cstatus">
	<input type="hidden" value="<?php echo $sec; ?>" name="sec">

	<div class="row">
		<label for="studentName">Student Name</label>
		<input name="studentName" id="studentName" type="text" value="">
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
		<?php echo $form->textField($model,'day'); ?>
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