<h1>รายวิชาที่เรียน</h1>

<h2><?php echo $semester->name; ?></h2>
<ul>
	<?php foreach ($allSemester as $s): ?>
	<li><?php echo CHtml::link($s->name, array('student/home', 'sid'=>$s->id)); ?></li>
	<?php endforeach; ?>
</ul>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewhome',
)); ?>
