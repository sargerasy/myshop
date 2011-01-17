<?php

/**
 * This is the model class for table "ecs_brand".
 *
 * The followings are the available columns in table 'ecs_brand':
 * @property integer $brand_id
 * @property string $brand_name
 * @property string $brand_logo
 * @property string $brand_desc
 * @property string $site_url
 * @property integer $sort_order
 * @property integer $is_show
 */
class Brand extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Brand the static model class
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
		return 'ecs_brand';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('brand_desc', 'required'),
			array('sort_order, is_show', 'numerical', 'integerOnly'=>true),
			array('brand_name', 'length', 'max'=>60),
			array('brand_logo', 'length', 'max'=>80),
			array('site_url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('brand_id, brand_name, brand_logo, brand_desc, site_url, sort_order, is_show', 'safe', 'on'=>'search'),
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
			'brand_id' => 'Brand',
			'brand_name' => 'Brand Name',
			'brand_logo' => 'Brand Logo',
			'brand_desc' => 'Brand Desc',
			'site_url' => 'Site Url',
			'sort_order' => 'Sort Order',
			'is_show' => 'Is Show',
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

		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('brand_name',$this->brand_name,true);
		$criteria->compare('brand_logo',$this->brand_logo,true);
		$criteria->compare('brand_desc',$this->brand_desc,true);
		$criteria->compare('site_url',$this->site_url,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('is_show',$this->is_show);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}