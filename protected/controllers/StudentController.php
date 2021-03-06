<?php

class StudentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', 
				'actions'=>array('home','studycourse'),
				'users'=>array('@'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('staff', 'admin'))) {
			$this->redirect(array('site/index'));
		}

		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('staff', 'admin'))) {
			$this->redirect(array('site/index'));
		}

		$model=new Student;
		$user=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
			$user->attributes=$_POST['User'];
			$student = Student::model()->find('studentCode=:code', array(':code'=>$model->studentCode));

			if($student!==null) 
			{
				$model->addError('studentCode', 'You have this studentID already');
				$this->render('create', array('model'=>$model,'user'=>$user));
				return;
			}
			else
			{
				$user->username = $model->studentCode;
				$user->role = 'student';
				$user->save();
				$model->userId = $user->id;
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model, 'user'=>$user
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('staff', 'admin'))) {
			$this->redirect(array('site/index'));
		}

		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('staff', 'admin'))) {
			$this->redirect(array('site/index'));
		}

		$student = $this->loadModel($id);
		$userId = $student->userId;
		$student->delete();
		User::model()->findByPk($userId)->delete();


		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('staff', 'admin'))) {
			$this->redirect(array('site/index'));
		}

		$dataProvider=new CActiveDataProvider('Student');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('staff', 'admin'))) {
			$this->redirect(array('site/index'));
		}

		$model=new Student('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Student']))
			$model->attributes=$_GET['Student'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Student::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionHome()
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('student'))) {
			$this->redirect(array('site/index'));
		}

		$scourse = Yii::app()->db->createCommand()
		    ->select('cinfo.*, c.courseName, c.courseCode, s.name as sname, t.teacherName, t.teacherLastname')
		    ->from('tbl_user u')
		    ->join('tbl_student st', 'u.id = st.userId')
		    ->join('tbl_coursestudy cstudy','cstudy.studentId = st.id')
			->join('tbl_courseinfo cinfo', 'cinfo.courseId = cstudy.courseId AND cinfo.courseStatus = cstudy.courseStatus
					AND cinfo.sectionGroup = cstudy.sectionGroup')
			->join('tbl_teacher t','t.id = cinfo.teacherId')
			->join('tbl_course c', 'cinfo.courseId = c.id')
			->join('tbl_semester s', 'c.semesterId = s.id');

		$semester;
		if(isset($_GET['sid']))
		{
			$sid = $_GET['sid'];
			$semester = Semester::model()->findByPk($sid);
			$scourse->where('s.id = :sid AND u.id =:user',array(':user'=>Yii::app()->user->id, ':sid'=>$sid));
		}
		else
		{
			$semester = Semester::model()->find('active=1');
		    $scourse->where('s.active = 1 AND u.id =:user',array(':user'=>Yii::app()->user->id));
		}
		
		$scourse = $scourse->query();
		
		$courseInfo = $scourse->readAll();
		$dataProvider = new CArrayDataProvider($courseInfo);

		$allSemester = Semester::model()->findAll();

		$this->render('home',array(
			'dataProvider'=>$dataProvider,
			'semester'=>$semester,
			'allSemester'=>$allSemester
		));
	}


	public function actionStudycourse()
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('student'))) {
			$this->redirect(array('site/index'));
		}

		$student = Student::model()->find('userId=:id', array(':id'=>Yii::app()->user->id));
		
		$cid = $_GET['cid'];
		$cstatus = $_GET['cstatus'];
		$sec = $_GET['sec'];

		$cstudy = Coursestudy::model()->find('studentId=:sid AND courseId=:cid AND courseStatus=:cstatus AND sectionGroup=:sec',
			 array(':sid'=>$student->id,':cid'=>$cid,':cstatus'=>$cstatus,':sec'=>$sec));
		$cinfo = Courseinfo::model()->find('id=:csid',array(':csid'=>$cstudy->courseinfoId));

		$rule = Courserule::model()->find('courseId=:cid AND courseStatus=:cstatus',
			 array(':cid'=>$cid,':cstatus'=>$cstatus));

		$total = "select count(distinct a.day) as total
					from tbl_attend a 
					where a.courseId = :cid
					and a.courseStatus = :cstatus
					and a.sectionGroup = :sec";

		$ctotal = Yii::app()->db->createCommand()->setText($total);
		$ctotal->params = array(':cid'=>$cid,':sec'=>$sec,':cstatus'=>$cstatus);
		$ctotal = $ctotal->query();
		$courseTotal = $ctotal->readAll();

		$sql = "select distinct a.day, sattend.studentCode as id,
					coalesce(sattend.timeIn,'-') as 'timeIn',
					coalesce(sattend.timeOut,'-') as 'timeOut',
					coalesce(sattend.attendStatus, 'Absent') as 'attendStatus',
					coalesce(sattend.week,'-') as 'week'
					from tbl_attend a
				left outer join (
					select a.day, s.studentCode, a.timeIn, a.timeOut,a.attendStatus,a.week
					from tbl_attend a
					join tbl_student s on a.studentId = s.id
					where s.id = :user) sattend on sattend.day = a.day
					where a.courseId = :cid
					and a.courseStatus = :cstatus
					and a.sectionGroup = :sec";

		$info = Yii::app()->db->createCommand()->setText($sql);
		$info->params = array(':cid'=>$cid,':sec'=>$sec,':cstatus'=>$cstatus,':user'=>$student->id);
		$info = $info->query();
		$courseInfo = $info->readAll();

		$dataProvider = new CArrayDataProvider($courseInfo);

		$quli = "select (attend_all.attend - coalesce(attend_absent.absent, 0)) >= rule.conditionRule/100*course.total as qualified
				from 
					(select a.studentId , count(a.id) as attend, cs.courseId, cs.courseStatus
					from tbl_coursestudy cs
					join tbl_attend a on a.courseStudyId = cs.id
					where cs.courseId = :cid
					and cs.courseStatus = :cstatus
					and cs.sectionGroup = :sec
					and a.studentId = :user) attend_all
				join
					(select count(distinct a.day) as total
					from tbl_attend a 
					where a.courseId = :cid
					and a.courseStatus = :cstatus
					and a.sectionGroup = :sec) course
				join 
					(select a.studentId , count(a.id) as absent
					from tbl_coursestudy cs
					join tbl_attend a on a.courseStudyId = cs.id
					where cs.courseId = :cid
					and cs.courseStatus = :cstatus
					and cs.sectionGroup = :sec
					and a.attendStatus = 'Absent'
					and a.studentId = :user) attend_absent
				join tbl_courserule rule 
					on attend_all.courseId = rule.courseId and attend_all.courseStatus = rule.courseStatus";


		$qualify = Yii::app()->db->createCommand()->setText($quli);
		$qualify->params = array(':cid'=>$cid,':sec'=>$sec,':cstatus'=>$cstatus,':user'=>$student->id);
		$qualify = $qualify->query();
		$qualifyValue = $qualify->readAll();
		if($qualifyValue == null){
			$qualifyValue[0] = array('qualified' => '7');
		}

		$this->render('studycourse',array(
			'dataProvider'=>$dataProvider,
			'cinfo'=>$cinfo,
			'rule'=>$rule,
			'qualify'=>$qualifyValue,
			'courseTotal'=>$courseTotal
		));
	}

}
