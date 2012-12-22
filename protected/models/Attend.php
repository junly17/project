<?php

/**
 * This is the model class for table "tbl_attend".
 *
 * The followings are the available columns in table 'tbl_attend':
 * @property integer $id
 * @property integer $courseId
 * @property string $courseStatus
 * @property integer $studentId
 * @property string $timeIn
 * @property string $timeOut
 * @property string $day
 * @property integer $week
 * @property string $attendStatus
 * @property string $sectionGroup
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Student $student
 */
class Attend extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attend the static model class
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
		return 'tbl_attend';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('courseId, courseStatus, sectionGroup', 'required'),
			array('courseId, studentId, week', 'numerical', 'integerOnly'=>true),
			array('courseStatus, attendStatus', 'length', 'max'=>45),
			array('sectionGroup', 'length', 'max'=>6),
			array('timeIn, timeOut, day', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, courseId, courseStatus, studentId, timeIn, timeOut, day, week, attendStatus, sectionGroup', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'Student', 'studentId'),
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
			'studentId' => 'Student',
			'timeIn' => 'Time In',
			'timeOut' => 'Time Out',
			'day' => 'Day',
			'week' => 'Week',
			'attendStatus' => 'Attend Status',
			'sectionGroup' => 'Section Group',
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
		$criteria->compare('studentId',$this->studentId);
		$criteria->compare('timeIn',$this->timeIn,true);
		$criteria->compare('timeOut',$this->timeOut,true);
		$criteria->compare('day',$this->day,true);
		$criteria->compare('week',$this->week);
		$criteria->compare('attendStatus',$this->attendStatus,true);
		$criteria->compare('sectionGroup',$this->sectionGroup,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function searchCourse($cid,$cstatus,$sec,$studentName)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 't.courseId=:cid AND t.courseStatus=:cstatus AND t.sectionGroup=:sec';
		$criteria->params = array(
	                ':cid'=>$cid,
	                ':cstatus'=>$cstatus,
	                ':sec'=>$sec
	            );
		$criteria->join = "JOIN tbl_student s ON s.id = t.studentId";
		if($studentName != ""){
			$criteria->compare('s.studentName',$studentName,true);
		}

		$criteria->compare('timeIn',$this->timeIn,true);
		$criteria->compare('timeOut',$this->timeOut,true);
		$criteria->compare('day',$this->day,true);
		$criteria->compare('week',$this->week);
		$criteria->compare('attendStatus',$this->attendStatus,true);
		$criteria->compare('sectionGroup',$this->sectionGroup,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}