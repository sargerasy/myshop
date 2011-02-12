<?php

/**
 * This is the model class for table "ecs_attribute".
 *
 * The followings are the available columns in table 'ecs_attribute':
 * @property integer $attr_id
 * @property integer $cat_id
 * @property string $attr_name
 * @property integer $attr_input_type
 * @property integer $attr_type
 * @property string $attr_values
 * @property integer $attr_index
 * @property integer $sort_order
 * @property integer $is_linked
 * @property integer $attr_group
 */
class Attribute extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Attribute the static model class
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
		return 'ecs_attribute';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('attr_values', 'required'),
			array('cat_id, attr_input_type, attr_type, attr_index, sort_order, is_linked, attr_group', 'numerical', 'integerOnly'=>true),
			array('attr_name', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('attr_id, cat_id, attr_name, attr_input_type, attr_type, attr_values, attr_index, sort_order, is_linked, attr_group', 'safe', 'on'=>'search'),
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
			'attr_id' => 'Attr',
			'cat_id' => 'Cat',
			'attr_name' => 'Attr Name',
			'attr_input_type' => 'Attr Input Type',
			'attr_type' => 'Attr Type',
			'attr_values' => 'Attr Values',
			'attr_index' => 'Attr Index',
			'sort_order' => 'Sort Order',
			'is_linked' => 'Is Linked',
			'attr_group' => 'Attr Group',
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

		$criteria->compare('attr_id',$this->attr_id);
		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('attr_name',$this->attr_name,true);
		$criteria->compare('attr_input_type',$this->attr_input_type);
		$criteria->compare('attr_type',$this->attr_type);
		$criteria->compare('attr_values',$this->attr_values,true);
		$criteria->compare('attr_index',$this->attr_index);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('is_linked',$this->is_linked);
		$criteria->compare('attr_group',$this->attr_group);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}