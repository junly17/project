<?php

class RentalController extends Controller
{
	public function actionAdd()
	{
		$model = new RentalForm;
		if(isset($_POST['RentalForm']))
		{
			// days was sent as array
			// we will store it in $days first
			$days = $_POST['RentalForm']['days'];
			// function implode will connect all array items to string
			$days = implode(',', $days);
			// store days to Active Record
			$rental = new Rental;
			$rental->days = $days;
			
			if($rental->save())
				$this->redirect(array('index'));
		}
		$this->render('add', array(
			'model'=>$model
		));
	}

	public function actionIndex()
	{
		$rentals = Rental::model()->findAll();
		$this->render('index', array(
			'rentals'=>$rentals
		));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}