<?php

/**
 * This is the model class for table "tbl_student".
 *
 * The followings are the available columns in table 'tbl_student':
 * @property integer $id
 * @property string $studentCode
 * @property string $studentName
 * @property string $studentLastname
 * @property string $studentStatus
 * @property integer $userId
 *
 * The followings are the available model relations:
 * @property Coursestudy[] $coursestudies
 * @property User $user
 */
class Student extends CActiveRecord
{

	public function getFullName()
	{
		return $this->studentName." ".$this->studentLastname;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('studentCode, studentName, studentLastname, studentStatus', 'required'),
			array('userId', 'numerical', 'integerOnly'=>true),
			array('studentCode', 'length', 'max'=>10),
			array('studentName, studentLastname, studentStatus', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, studentCode, studentName, studentLastname, studentStatus, userId', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'coursestudies' => array(self::HAS_MANY, 'Coursestudy', 'studentId'),
			'user' => array(self::BELONGS_TO, 'User', 'userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'studentCode' => 'Student Code',
			'studentName' => 'Student Name',
			'studentLastname' => 'Student Lastname',
			'studentStatus' => 'Student Status',
			'userId' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('studentCode',$this->studentCode,true);
		$criteria->compare('studentName',$this->studentName,true);
		$criteria->compare('studentLastname',$this->studentLastname,true);
		$criteria->compare('studentStatus',$this->studentStatus,true);
		$criteria->compare('userId',$this->userId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}