<?php
/* @var $this RentalController */

$this->breadcrumbs=array(
	'Rental'=>array('/rental'),
	'Add',
);
?>
<h1>Add Rental</h1>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'rental-form',
)); ?>

<div class="row">
    <?php echo $form->checkBoxList($model,'days',array(
    	'0'=>'Sun',
    	'1'=>'Mon',
    	'2'=>'Tue',
    	'3'=>'Wed',
    	'4'=>'Thu',
    	'5'=>'Fri',
    	'6'=>'Sat'
    )); ?>
</div>

<div class="row buttons">
	<?php echo CHtml::submitButton('Add'); ?>
</div>

<?php $this->endWidget(); ?>
