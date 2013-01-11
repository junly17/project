<?php

class RentalForm extends CFormModel
{
	public $days;

	public function rules()
	{
		return array(
			array('days', 'required')
		);
	}

	public function attributeLabels()
	{
		return array(
			'days'=>'Days'
		);
	}
}