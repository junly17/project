<?php

/**
 * This is the model class for table "tbl_courserule".
 *
 * The followings are the available columns in table 'tbl_courserule':
 * @property integer $id
 * @property integer $courseId
 * @property string $lateTime
 * @property string $absenceTime
 * @property integer $condition
 * @property string $courseStatus
 *
 * The followings are the available model relations:
 * @property Course $course
 */
class Courserule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Courserule the static model class
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
		return 'tbl_courserule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('courseId, lateTime, absenceTime, condition, courseStatus', 'required'),
			array('courseId, condition', 'numerical', 'integerOnly'=>true),
			array('courseStatus', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, courseId, lateTime, absenceTime, condition, courseStatus', 'safe', 'on'=>'search'),
			array('lateTime,absenceTime', 'type', 'type' => 'time', 'message' => '{attribute} is incorrect', 'timeFormat' => 'hh:mm:ss'),
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
			'lateTime' => 'Late Time',
			'absenceTime' => 'Absence Time',
			'condition' => 'Condition',
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
		$criteria->compare('lateTime',$this->lateTime,true);
		$criteria->compare('absenceTime',$this->absenceTime,true);
		$criteria->compare('condition',$this->condition);
		$criteria->compare('courseStatus',$this->courseStatus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}