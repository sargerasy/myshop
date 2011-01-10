<?php

/**
 * This is the model class for table "ecsx_groups".
 *
 * The followings are the available columns in table 'ecsx_groups':
 * @property integer $group_id
 * @property integer $group_name
 * @property integer $group_desc
 */
class Group extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Group the static model class
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
		return 'ecsx_groups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_name, group_desc', 'required'),
			array('group_name, group_desc', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('group_id, group_name, group_desc', 'safe', 'on'=>'search'),
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
			'memberCount' => array(self::STAT, 'User',
				'ecsx_user_group(group_id, user_id)'),
			'users' => array(self::MANY_MANY, 'User',
				'ecsx_user_group(group_id, user_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'group_id' => 'Group',
			'group_name' => 'Group Name',
			'group_desc' => 'Group Desc',
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

		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('group_name',$this->group_name);
		$criteria->compare('group_desc',$this->group_desc);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Retrieves a list of members
	 */
	public function members()
	{
		return new CActiveDataProvider(get_class($this), array(
			'data'=>$this->users,
		));
	}

	public function addMembers($member_ids)
	{
		foreach($member_ids as $id) {
			$relation = new GroupMember;
			$relation->group_id = $this->group_id;
			$relation->user_id = $id;
			$relation->save();
		}
	}

	public function delMembers($member_ids)
	{
		foreach($member_ids as $id) {
			$relation = GroupMember::model()->findByAttributes(array("user_id"=>$id, "group_id"=>$this->group_id));
			$relation->delete();
		}
	}
}

class GroupMember extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Group the static model class
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
		return 'ecsx_user_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, group_id', 'required'),
			array('user_id, group_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, group_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'group_id' => 'Group Id',
			'user_id' => 'User Id',
		);
	}
}
