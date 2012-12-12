<?php

class ChangePasswordForm extends CFormModel
{
	public $current;
	public $newPassword;
	public $confirmPassword;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('current, newPassword, confirmPassword', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'current'=>'Current Password',
			'newPassword'=>'Your New Password'
		);
	}

}
