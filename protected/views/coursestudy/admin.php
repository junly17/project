<?php
/* @var $this CoursestudyController */
/* @var $model Coursestudy */

$this->breadcrumbs=array(
	'Coursestudies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Coursestudy', 'url'=>array('index')),
	array('label'=>'Create Coursestudy', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('coursestudy-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Coursestudies</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coursestudy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		array(
			'name'=>'courseId',
			'value'=>'$data->course->fullname',
		),
		array(
			'name'=>'studentId',
			'value'=>'$data->student->fullname',
		),
		'courseStatus',
		'sectionGroup',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
