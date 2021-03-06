<?php

class CoursestudyController extends Controller
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
		
		$model=new Coursestudy;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Coursestudy']))
		{
			$model->attributes=$_POST['Coursestudy'];

			$cinfo = Courseinfo::model()->find('courseId=:course AND courseStatus=:cstatus AND sectionGroup=:sec',
					 array(':course'=>$model->courseId,':cstatus'=>$model->courseStatus,':sec'=>$model->sectionGroup));

			$cstudy = Coursestudy::model()->find('courseId=:course', array(':course'=>$model->courseId));

			if($cinfo == null)
			{
				$model->addError('sectionGroup', 'Do not have section/group in this courseinfo');
				$this->render('create', array('model'=>$model));
				return;
			}

			if($cstudy!==null) 
			{
				if($cstudy->studentId==$model->studentId && $cstudy->sectionGroup==$model->sectionGroup 
					&& $cstudy->courseStatus==$model->courseStatus)
				{
					
					$model->addError('courseId', 'You have this course, student, course status and section/group already');
					$model->addError('studentId', 'You have this course, student, course status and section/group already');
					$model->addError('courseStatus', 'You have this course, student, course status and section/group already');
					$model->addError('sectionGroup', 'You have this course, student, course status and section/group already');
					$this->render('create', array('model'=>$model));
					return;
				}
				else
				{
					$criteria = new CDbCriteria;
					$criteria->condition='courseId=:course';
					$criteria->params=array(':course'=>$model->courseId);
					$courseinfo = Courseinfo::model()->find($criteria);
					$model->courseinfoId=$courseinfo->id;

					if($model->save())
						$this->redirect(array('view','id'=>$model->id));
				}
			}
			else
			{
				$criteria = new CDbCriteria;
				$criteria->condition='courseId=:course';
				$criteria->params=array(':course'=>$model->courseId);
				$courseinfo = Courseinfo::model()->find($criteria);
				$model->courseinfoId=$courseinfo->id;

				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}

		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Coursestudy']))
		{
			$model->attributes=$_POST['Coursestudy'];

			$cinfo = Courseinfo::model()->find('courseId=:course AND courseStatus=:cstatus AND sectionGroup=:sec',
					 array(':course'=>$model->courseId,':cstatus'=>$model->courseStatus,':sec'=>$model->sectionGroup));

			$cstudy = Coursestudy::model()->find('courseId=:course', array(':course'=>$model->courseId));

			if($cinfo == null)
			{
				$model->addError('sectionGroup', 'Do not have section/group in this courseinfo');
				$this->render('create', array('model'=>$model));
				return;
			}

			if($cstudy!==null) 
			{
				if($cstudy->studentId==$model->studentId && $cstudy->sectionGroup==$model->sectionGroup 
					&& $cstudy->courseStatus==$model->courseStatus && $cstudy->id!==$model->id)
				{
					$model->addError('courseId', 'You have this course, student, course status and section/group already');
					$model->addError('studentId', 'You have this course, student, course status and section/group already');
					$model->addError('courseStatus', 'You have this course, student, course status and section/group already');
					$model->addError('sectionGroup', 'You have this course, student, course status and section/group already');
					$this->render('create', array('model'=>$model));
					return;
				}
				else
				{
					$criteria = new CDbCriteria;
					$criteria->condition='courseId=:course';
					$criteria->params=array(':course'=>$model->courseId);
					$courseinfo = Courseinfo::model()->find($criteria);
					$model->courseinfoId=$courseinfo->id;

					if($model->save())
						$this->redirect(array('view','id'=>$model->id));
				}
			}
			else
			{
				$criteria = new CDbCriteria;
				$criteria->condition='courseId=:course';
				$criteria->params=array(':course'=>$model->courseId);
				$courseinfo = Courseinfo::model()->find($criteria);
				$model->courseinfoId=$courseinfo->id;

				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}

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
		
		$this->loadModel($id)->delete();

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
		
		$dataProvider=new CActiveDataProvider('Coursestudy');
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
		
		$model=new Coursestudy('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Coursestudy']))
			$model->attributes=$_GET['Coursestudy'];

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
		$model=Coursestudy::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='coursestudy-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
