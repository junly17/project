<?php

/**
 * This is the model class for table "tbl_course".
 *
 * The followings are the available columns in table 'tbl_course':
 * @property integer $id
 * @property string $courseCode
 * @property string $courseName
 * @property integer $numOfweek
 * @property integer $semesterId
 *
 * The followings are the available model relations:
 * @property Semester $semester
 * @property Courseinfo[] $courseinfos
 * @property Courserule[] $courserules
 * @property Coursestudy[] $coursestudies
 */
class Course extends CActiveRecord
{
	public function getFullName()
	{
		return $this->courseCode." ".$this->courseName;
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Course the static model class
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
		return 'tbl_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('courseCode, courseName, numOfweek', 'required'),
			array('numOfweek, semesterId', 'numerical', 'integerOnly'=>true),
			array('courseCode', 'length', 'max'=>5),
			array('courseName', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, courseCode, courseName, numOfweek, semesterId', 'safe', 'on'=>'search'),
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
			'semester' => array(self::BELONGS_TO, 'Semester', 'semesterId'),
			'courseinfos' => array(self::HAS_MANY, 'Courseinfo', 'courseId'),
			'courserules' => array(self::HAS_MANY, 'Courserule', 'courseId'),
			'coursestudies' => array(self::HAS_MANY, 'Coursestudy', 'courseId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'courseCode' => 'Course Code',
			'courseName' => 'Course Name',
			'numOfweek' => 'Num Ofweek',
			'semesterId' => 'Semester',
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
		$criteria->compare('courseCode',$this->courseCode,true);
		$criteria->compare('courseName',$this->courseName,true);
		$criteria->compare('numOfweek',$this->numOfweek);
		$criteria->compare('semesterId',$this->semesterId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}