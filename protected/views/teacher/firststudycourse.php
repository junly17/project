<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attend-form',
	'enableAjaxValidation'=>false,
	'method'=>'get'
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'day'); ?>
		<?php echo CHtml::activeTextField($model,'day',array("id"=>"day")); ?>
		&nbsp;(calendar appears when textbox is clicked)
			<?php $this->widget('application.extensions.calendar.SCalendar',
			array(
			'inputField'=>'day',
			'ifFormat'=>'%Y-%m-%d',
			));
		?>
		<?php echo $form->error($model,'day'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'studentCode',
		'studentName',
		'studentLastname',
		'timeIn',
		'timeOut',
		'day',
		'week',
		'attendStatus'
	),
)); 
?>