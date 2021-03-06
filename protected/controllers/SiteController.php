<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$role = Yii::app()->user->isGuest? 'guest': Yii::app()->user->role;
				if($role == 'student'){
					$this->redirect(array('student/home'));
				}
				else if($role == 'teacher'){
					$this->redirect(array('teacher/home'));
				}
				else if($role == 'staff'){
					$this->redirect(array('staff/home'));
				}
				else if($role == 'admin'){
					$this->redirect(array('admin/index'));
				}
			}

				
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


	public function actionChangePassword()
	{
		$data = new ChangePasswordForm;
		if(isset($_POST['ChangePasswordForm']))
		{
			$data->attributes = $_POST['ChangePasswordForm'];
			if($data->validate()) 
			{
				$userId = Yii::app()->user->id;
				$user = User::model()->findByPk($userId);
				if($data->current !== $user->password) {
					$data->addError('current', 'Your old password is incorrect');
					$this->render('changePassword', array('model'=>$data));
					return;
				}
				if($data->newPassword !== $data->confirmPassword)
				{
					$data->addError('confirmPassword', 'Your new password and confirm password does not match');
					$this->render('changePassword', array('model'=>$data));
					return;
				}
				$user->password = $data->newPassword;
				$user->save();
				$role = $user->role;
				if($role === 'student')
				{
					$this->redirect(array('student/home'));
					return;
				}
				else if($role === 'teacher')
				{
					$this->redirect(array('teacher/home'));
					return;
				}
				else if($role === 'staff')
				{
					$this->redirect(array('staff/home'));
					return;
				}
				//return;
			}
		}
		$this->render('changePassword', array('model'=>$data));
	}
}