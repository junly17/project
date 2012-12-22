<?php

/**
 * This is the model class for table "tbl_courseinfo".
 *
 * The followings are the available columns in table 'tbl_courseinfo':
 * @property integer $id
 * @property integer $courseId
 * @property string $courseStatus
 * @property string $sectionGroup
 * @property string $timeBegin
 * @property string $timeOut
 * @property string $build
 * @property string $room
 * @property string $studyDay
 * @property integer $teacherId
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Teacher $teacher
 * @property Coursestudy[] $coursestudies
 */
class Courseinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Courseinfo the static model class
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
		return 'tbl_courseinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('courseId, courseStatus, sectionGroup, timeBegin, timeOut, build, room, studyDay, teacherId', 'required'),
			array('courseId, teacherId', 'numerical', 'integerOnly'=>true),
			array('courseStatus', 'length', 'max'=>45),
			array('sectionGroup', 'length', 'max'=>6),
			array('build', 'length', 'max'=>10),
			array('room', 'length', 'max'=>4),
			array('studyDay', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, courseId, courseStatus, sectionGroup, timeBegin, timeOut, build, room, studyDay, teacherId', 'safe', 'on'=>'search'),
			array('timeBegin,timeOut', 'type', 'type' => 'time', 'message' => '{attribute} is incorrect', 'timeFormat' => 'hh:mm:ss',),
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
			'course' => array(self::BELONGS_TO, 'Course', 'courseId'),
			'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacherId'),
			'coursestudies' => array(self::HAS_MANY, 'Coursestudy', 'courseinfoId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'courseId' => 'Course',
			'courseStatus' => 'Course Status',
			'sectionGroup' => 'Section Group',
			'timeBegin' => 'Time Begin',
			'timeOut' => 'Time Out',
			'build' => 'Build',
			'room' => 'Room',
			'studyDay' => 'Study Day',
			'teacherId' => 'Teacher',
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
		$criteria->compare('courseId',$this->courseId);
		$criteria->compare('courseStatus',$this->courseStatus,true);
		$criteria->compare('sectionGroup',$this->sectionGroup,true);
		$criteria->compare('timeBegin',$this->timeBegin,true);
		$criteria->compare('timeOut',$this->timeOut,true);
		$criteria->compare('build',$this->build,true);
		$criteria->compare('room',$this->room,true);
		$criteria->compare('studyDay',$this->studyDay,true);
		$criteria->compare('teacherId',$this->teacherId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}