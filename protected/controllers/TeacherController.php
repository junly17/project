<?php

class TeacherController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('home','studycourse','studysemester','courserequire','updaterule'),
				'users'=>array('@'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','firststudycourse'),
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

		$model=new Teacher;
		$user=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Teacher']))
		{
			$model->attributes=$_POST['Teacher'];
			$user->attributes=$_POST['User'];
			$teacher = teacher::model()->find('teacherCode=:code', array(':code'=>$model->teacherCode));

			if($teacher!==null) 
			{
				$model->addError('teacherCode', 'You have this teacherID already');
				$this->render('create', array('model'=>$model,'user'=>$user));
				return;
			}
			else
			{
				$user->username = $model->teacherCode;
				$user->role = 'teacher';
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

		if(isset($_POST['Teacher']))
		{
			$model->attributes=$_POST['Teacher'];
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

		$teacher = $this->loadModel($id);
		$userId = $teacher->userId;
		$teacher->delete();
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

		$dataProvider=new CActiveDataProvider('Teacher');
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

		$model=new Teacher('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Teacher']))
			$model->attributes=$_GET['Teacher'];

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
		$model=Teacher::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='teacher-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionHome()
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('teacher'))) {
			$this->redirect(array('site/index'));
		}

		$info = Yii::app()->db->createCommand()
		    ->select('cinfo.*, c.courseName, c.courseCode, s.name as sname')
		    ->from('tbl_user u')
		    ->join('tbl_teacher t', 'u.id = t.userId')
			->join('tbl_courseinfo cinfo', 'cinfo.teacherId = t.id')
			->join('tbl_course c', 'cinfo.courseId = c.id')
			->join('tbl_semester s', 'c.semesterId = s.id');

		$semester;
		if(isset($_GET['sid']))
		{
			$sid = $_GET['sid'];
			$semester = Semester::model()->findByPk($sid);
			$info->where('s.id = :sid AND u.id =:user',array(':user'=>Yii::app()->user->id, ':sid'=>$sid));
		}
		else
		{
			$semester = Semester::model()->find('active=1');
		    $info->where('s.active = 1 AND u.id =:user',array(':user'=>Yii::app()->user->id));
		}
		
		$info = $info->query();
		
		$courseInfo = $info->readAll();
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
		if(!in_array($role, array('teacher'))) {
			$this->redirect(array('site/index'));
		}

		$cid = $_GET['cid'];
		$cstatus = $_GET['cstatus'];
		$sec = $_GET['sec'];
		$studentName = "";

		if (isset($_GET['studentName']))
			$studentName = $_GET['studentName'];
		
		$model=new Attend('searchCourse');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Attend']))
			$model->attributes=$_GET['Attend'];

		$dataProvider=new CActiveDataProvider('Attend', array(
			'criteria'=>array(
				'condition'=>'t.courseId=:cid AND t.courseStatus=:cstatus AND t.sectionGroup=:sec',
	            'params'=>array(
	                ':cid'=>$cid,
	                ':cstatus'=>$cstatus,
	                ':sec'=>$sec
	            )
	         )
		));

		$this->render('studycourse',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
			'cid'=>$cid,
			'cstatus'=>$cstatus,
			'sec'=>$sec,
			'studentName'=>$studentName
		));
	}

	public function actionFirststudycourse()
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('teacher'))) {
			$this->redirect(array('site/index'));
		}

		$cid = $_GET['cid'];
		$cstatus = $_GET['cstatus'];
		$sec = $_GET['sec'];
		$dataProvider = new CArrayDataProvider(array());

		$model=new Attend;

		if(isset($_GET['Attend'])){
			$model->attributes=$_GET['Attend'];

			$info = Yii::app()->db->createCommand()
		    ->select('s.studentCode, s.studentName, s.studentLastname, c.courseCode, c.courseName,a.week,
		    		 cstudy.sectionGroup, cstudy.courseStatus, a.studentId as id, a.attendStatus, a.timeIn, a.timeOut, a.day')
		    ->from('tbl_coursestudy cstudy')
		    ->join('tbl_course c', 'cstudy.courseId = c.id')
			->leftJoin('tbl_attend a', 'c.id = a.courseId')
			->join('tbl_student s', 'cstudy.studentId = s.id')
			->where('c.id =:cid AND cstudy.sectionGroup=:sec AND cstudy.courseStatus=:cstatus AND 
					a.day=:day AND a.sectionGroup=cstudy.sectionGroup AND cstudy.studentId = a.studentId');
			$info->params = (array(':cid'=>$cid,':sec'=>$sec,':cstatus'=>$cstatus,':day'=>$model->day));

			$info = $info->query();
			
			$courseInfo = $info->readAll();
			$dataProvider = new CArrayDataProvider($courseInfo);
		}

		$this->render('firststudycourse',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
			'cid'=>$cid,
			'cstatus'=>$cstatus,
			'sec'=>$sec,
		));

	}

	public function actionStudysemester()
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('teacher'))) {
			$this->redirect(array('site/index'));
		}

		$this->render('studysemester');

	}


	public function actionCourserequire()
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('teacher'))) {
			$this->redirect(array('site/index'));
		}

		$cid = $_GET['cid'];
		$cstatus = $_GET['cstatus'];
		//$courserule = Courserule::model()->find('courseId=:courseid',array(':courseid'=>$cid));

		$dataProvider=new CActiveDataProvider('Courserule', array(
			'criteria'=>array(
				'condition'=>'t.courseId=:courseid AND t.courseStatus =:cstatus',
	            'params'=>array(
	                ':courseid'=>$cid,
	                ':cstatus'=>$cstatus
	            )
	         )
		));

		$this->render('courserequire',array(
			'dataProvider'=>$dataProvider,
			'cid'=>$cid,
			'cstatus'=>$cstatus
		));
	}


	public function actionUpdaterule()
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('teacher'))) {
			$this->redirect(array('site/index'));
		}

		if(isset($_POST['Courserule']))
		{
			date_default_timezone_set('Asia/Taipei');
			$cstatus = $_GET['cstatus'];
			$model=Courserule::model()->find('courseId=:cid AND courseStatus=:cstatus',
				array(':cid'=>$_POST['Courserule']['courseId'],':cstatus'=>$cstatus));
			$model->attributes = $_POST['Courserule'];
			$model->save();
			$dataProvider=new CActiveDataProvider('Courserule', array(
				'criteria'=>array(
					'condition'=>'t.courseId=:courseid AND t.courseStatus =:cstatus',
		            'params'=>array(
		                ':courseid'=>$model->courseId,
		                ':cstatus'=>$model->courseStatus
		            )
		         )
			));

			$this->render('courserequire',array(
				'dataProvider'=>$dataProvider,
				'cid'=>$model->courseId,
				'cstatus'=>$model->courseStatus
			));
			return;

		}

		$cid = $_GET['cid'];
		$cstatus = $_GET['cstatus'];
		$model = Courserule::model()->find('courseId=:codeid AND courseStatus=:cstatus', 
			array(':codeid'=>$cid,':cstatus'=>$cstatus));

		$this->render('updaterule',array(
			'model'=>$model,
		));
	}

}
