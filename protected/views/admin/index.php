
<h1>Admin</h1>

<ul>
	<li><?php echo CHtml::link("รายชื่อนักศึกษา (Student)",array('student/index')); ?></li>
	<li><?php echo CHtml::link("รายชื่ออาจารย์ (Teacher)",array('teacher/index')); ?></li>
	<li><?php echo CHtml::link("รายชื่อเจ้าหน้าที่ (Staff)",array('staff/index')); ?></li>
	<li><?php echo CHtml::link("รายวิชา (Course)",array('course/index')); ?></li>
	<li><?php echo CHtml::link("รายละเอียดรายวิชา (Course info)",array('courseinfo/index')); ?></li>
	<li><?php echo CHtml::link("ข้อกำหนดรายวิชา (Course rule)",array('courserule/index')); ?></li>
	<li><?php echo CHtml::link("ภาคการศึกษา (Semester)",array('semester/index')); ?></li>
    <li><?php echo CHtml::link("รายวิชาที่เรียน (Course study)",array('coursestudy/index')); ?></li>
	<li><?php echo CHtml::link("รหัสการเข้าใช้งาน (Username)",array('user/index')); ?></li>
</ul>