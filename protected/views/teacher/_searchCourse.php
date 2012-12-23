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
		<label for="studentLastname">Student Last Name</label>
		<input name="studentLastname" id="studentLastname" type="text" value="">
	</div>

	<div class="row">
		<?php echo $form->label($model,'timeIn'); ?>
		<?php echo $form->textField($model,'timeIn'); ?>
		(ex. 08:00:00)
	</div>

	<div class="row">
		<?php echo $form->label($model,'timeOut'); ?>
		<?php echo $form->textField($model,'timeOut'); ?>
		(ex. 08:00:00)
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