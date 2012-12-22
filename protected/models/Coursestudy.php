<?php

/**
 * This is the model class for table "tbl_coursestudy".
 *
 * The followings are the available columns in table 'tbl_coursestudy':
 * @property integer $id
 * @property integer $courseId
 * @property integer $studentId
 * @property string $sectionGroup
 * @property integer $courseinfoId
 * @property string $courseStatus
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Courseinfo $courseinfo
 * @property Student $student
 */
class Coursestudy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Coursestudy the static model class
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
		return 'tbl_coursestudy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('courseId, studentId, sectionGroup, courseStatus', 'required'),
			array('courseId, studentId, courseinfoId', 'numerical', 'integerOnly'=>true),
			array('sectionGroup', 'length', 'max'=>6),
			array('courseStatus', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, courseId, studentId, sectionGroup, courseinfoId, courseStatus', 'safe', 'on'=>'search'),
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
			'courseinfo' => array(self::BELONGS_TO, 'Courseinfo', 'courseinfoId'),
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
			'studentId' => 'Student',
			'sectionGroup' => 'Section Group',
			'courseinfoId' => 'Courseinfo',
			'courseStatus' => 'Course Status',
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
		$criteria->compare('studentId',$this->studentId);
		$criteria->compare('sectionGroup',$this->sectionGroup,true);
		$criteria->compare('courseinfoId',$this->courseinfoId);
		$criteria->compare('courseStatus',$this->courseStatus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}