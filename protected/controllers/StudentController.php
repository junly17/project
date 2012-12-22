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
				'actions'=>array('home','studycourse','semestercourse'),
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

		$dataProvider=new CActiveDataProvider('Attend', array(
			'criteria'=>array(
				'condition'=>'t.courseId=:cid AND t.courseStatus=:cstatus AND t.studentId=:sid AND t.sectionGroup=:sec',
	            'params'=>array(
	                ':cid'=>$cid,
	                ':cstatus'=>$cstatus,
	                ':sid'=>$student->id,
	                ':sec'=>$sec
	            )
	         )
		));

		$this->render('studycourse',array(
			'dataProvider'=>$dataProvider,
		));
	}


	public function actionSemestercourse()
	{
		$role = Yii::app()->user->role;
		if(!in_array($role, array('student'))) {
			$this->redirect(array('site/index'));
		}
		
		$this->render('semestercourse');
	}
}
