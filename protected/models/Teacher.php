<?php

/**
 * This is the model class for table "tbl_teacher".
 *
 * The followings are the available columns in table 'tbl_teacher':
 * @property integer $id
 * @property string $teacherCode
 * @property string $teacherName
 * @property string $teacherLastname
 * @property string $teacherStatus
 * @property integer $userId
 *
 * The followings are the available model relations:
 * @property Courseinfo[] $courseinfos
 * @property User $user
 */
class Teacher extends CActiveRecord
{
	public function getFullName()
	{
		return $this->teacherName." ".$this->teacherLastname;
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Teacher the static model class
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
		return 'tbl_teacher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('teacherCode, teacherName, teacherLastname, teacherStatus', 'required'),
			array('userId', 'numerical', 'integerOnly'=>true),
			array('teacherCode', 'length', 'max'=>10),
			array('teacherName, teacherLastname, teacherStatus', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, teacherCode, teacherName, teacherLastname, teacherStatus, userId', 'safe', 'on'=>'search'),
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
			'courseinfos' => array(self::HAS_MANY, 'Courseinfo', 'teacherId'),
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
			'teacherCode' => 'Teacher Code',
			'teacherName' => 'Teacher Name',
			'teacherLastname' => 'Teacher Lastname',
			'teacherStatus' => 'Teacher Status',
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
		$criteria->compare('teacherCode',$this->teacherCode,true);
		$criteria->compare('teacherName',$this->teacherName,true);
		$criteria->compare('teacherLastname',$this->teacherLastname,true);
		$criteria->compare('teacherStatus',$this->teacherStatus,true);
		$criteria->compare('userId',$this->userId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}