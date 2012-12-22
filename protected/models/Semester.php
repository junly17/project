<?php

/**
 * This is the model class for table "tbl_semester".
 *
 * The followings are the available columns in table 'tbl_semester':
 * @property integer $id
 * @property string $semester
 * @property string $year
 * @property string $openDate
 * @property string $endDate
 * @property string $name
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Course[] $courses
 */
class Semester extends CActiveRecord
{
	public function getActiveName()
	{
		if($this->active == 0)
			return 'Not active';
		else
			return 'Active';
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Semester the static model class
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
		return 'tbl_semester';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('semester, year, openDate, endDate, name', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('semester', 'length', 'max'=>1),
			array('year', 'length', 'max'=>4),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, semester, year, openDate, endDate, name, active', 'safe', 'on'=>'search'),
			array('openDate,endDate', 'type', 'type' => 'date', 'message' => '{attribute} is incorrect', 'dateFormat' => 'yyyy-mm-dd'),
			array('year', 'type', 'type' => 'date', 'message' => '{attribute} is incorrect', 'dateFormat' => 'yyyy'),
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
			'courses' => array(self::HAS_MANY, 'Course', 'semesterId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'semester' => 'Semester',
			'year' => 'Year',
			'openDate' => 'Open Date',
			'endDate' => 'End Date',
			'name' => 'Name',
			'active' => 'Active',
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
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('openDate',$this->openDate,true);
		$criteria->compare('endDate',$this->endDate,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}